<?php

namespace App\Http\Livewire\Quotations;

use Livewire\Component;
use App\Models\Client;
use Illuminate\Validation\Rule;

class ClientInfo extends Component
{

    public $open_create = false;
    public  $name, $address, $phone, $email, $average_energy_consumption, $solar_radiation_level, $roof_dimensions_length, $roof_dimensions_width;


    public function render()
    {
        $clients = Client::all();

        return view('livewire.quotations.client-info', compact('clients'));
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'average_energy_consumption' => 'required|numeric',
            'solar_radiation_level' => 'required|numeric',
            'roof_dimensions_length' => 'required|numeric',
            'roof_dimensions_width' => 'required|numeric',
        ]);
    }

    public function saveClient()
    {
        $this->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'average_energy_consumption' => 'required|numeric',
            'solar_radiation_level' => 'required|numeric',
            'roof_dimensions_length' => 'required|numeric',
            'roof_dimensions_width' => 'required|numeric',
        ]);

        Client::create([
            'name' => $this->name,
            'address' => $this->address,
            'phone' => $this->phone,
            'email' => $this->email,
            'average_energy_consumption' => $this->average_energy_consumption,
            'solar_radiation_level' => $this->solar_radiation_level,
            'roof_dimensions_length' => $this->roof_dimensions_length,
            'roof_dimensions_width' => $this->roof_dimensions_width,
        ]);

        $this->reset(); // Limpiar los campos después de guardar
        $this->emit('alert', '¡Cliente creado exitosamente!');
    }
}
