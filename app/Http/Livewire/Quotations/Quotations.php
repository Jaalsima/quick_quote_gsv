<?php

namespace App\Http\Livewire\Quotations;

use Livewire\Component;
use App\Models\Quotation;
use Livewire\WithPagination;

class Quotations extends Component
{
    use WithPagination;

    public $search, $quotation;
    public $sort = "id";
    public $direction = "desc";
    public $perPage = 10;
    public $open = false;
    protected $listeners = ['render'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Quotation::query();

        // Condiciones de búsqueda
        if ($this->search) {
            $query->where('id', 'like', '%' . $this->search . '%')
                ->orWhere('client_id', 'like', '%' . $this->search . '%')
                ->orWhere('total_quotation_amount', 'like', '%' . $this->search . '%');
        }

        $quotations = $query->orderBy($this->sort, $this->direction)
            ->paginate($this->perPage);

        return view('livewire.quotations.quotations', compact('quotations'));
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            $this->direction = ($this->direction == "desc") ? "asc" : "desc";
        } else {
            $this->sort = $sort;
            $this->direction = "asc";
        }
    }

    public function confirmDelete($quotationId)
    {
        $this->quotation = Quotation::find($quotationId);
        $this->open = true; // Abre el modal de confirmación
    }

    public function deleteConfirmed()
    {
        if ($this->quotation) {
            $this->quotation->delete();
            $this->emitTo('quotations', 'render');
            $this->emit('alert', '¡Cotización Eliminada!');
        }
        $this->open = false;
    }
}
