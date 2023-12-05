<?php

namespace App\Http\Livewire\Quotations;

use Livewire\Component;
use App\Models\Quotation;

class QuotationShow extends Component
{
    public $quotation;
    public $open_quotation = false;

    public function mount(Quotation $quotation)
    {
        $this->quotation = $quotation;
    }

    public function render()
    {
        return view('livewire.quotations.quotation-show');
    }
}
