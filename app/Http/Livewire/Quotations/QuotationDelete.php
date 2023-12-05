<?php

namespace App\Http\Livewire\Quotations;

use Livewire\Component;
use App\Models\Quotation;

class QuotationDelete extends Component
{
    public $open = false;
    public $quotation;

    public function render()
    {
        return view('livewire.quotations.quotation-delete');
    }

    public function deleteConfirmed()
    {
        if ($this->quotation) {
            $this->quotation->delete();
            $this->emitTo('quotations.quotations', 'render');
            $this->emit('alert', '¡Cotización Eliminada!');
        }
        $this->open = false; // Cierra el modal de confirmación
    }
}