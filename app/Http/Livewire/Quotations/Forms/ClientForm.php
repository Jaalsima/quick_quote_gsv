<?php

namespace App\Http\Livewire\Quotations\Forms;

use Livewire\Component;

class ClientForm extends Component
{

    public $openModal = false;
    public $name;
    public $address;
    public $phone;
    public $email;
    public $average_energy_consumption;
    public $solar_radiation_level;
    public $roof_dimensions_length;
    public $roof_dimensions_width;

    protected $rules = [
        'name' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
        'average_energy_consumption' => 'required',
        'solar_radiation_level' => 'required',
        'roof_dimensions_length' => 'required',
        'roof_dimensions_width' => 'required',
    ];

    public function openClientModal()
    {
        $this->openModal = true;
    }

    public function closeClientModal()
    {
        $this->openModal = false;
    }
    public function render()
    {
        return view('livewire.quotations.forms.client-form');
    }
}