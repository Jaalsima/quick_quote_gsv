<?php

namespace App\Http\Livewire\Clients;

use Livewire\Component;
use App\Models\Client;
use Livewire\WithPagination;

class Clients extends Component
{
    use WithPagination;

    public $search, $client;
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
        $query = Client::query();

        // Condiciones de búsqueda
        if ($this->search) {
            $query->where('id', 'like', '%' . $this->search . '%')
                ->orWhere('name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%');
        }

        $clients = $query->orderBy($this->sort, $this->direction)
            ->paginate($this->perPage);

        return view('livewire.clients.clients', compact('clients'));
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

    public function confirmDelete($clientId)
    {
        $this->client = Client::find($clientId);
        $this->open = true; // Abre el modal de confirmación
    }

    public function deleteConfirmed()
    {
        if ($this->Client) {
            $this->Client->delete();
            $this->emitTo('clients', 'render');
            $this->emit('alert', '¡Cotización Eliminada!');
        }
        $this->open = false;
    }
}
