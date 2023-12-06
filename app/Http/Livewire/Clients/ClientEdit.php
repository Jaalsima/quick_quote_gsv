<?php

namespace App\Http\Livewire\Clients;

use Livewire\Component;
use App\Models\Client;
use Livewire\WithFileUploads;

class ClientEdit extends Component
{
    use WithFileUploads;

    public $client;
    public  $name, $address, $phone, $email, $average_energy_consumption, $solar_radiation_level, $roof_dimensions_length, $roof_dimensions_width;

    public $open_edit = false;

    protected $rules = [
        'name' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
        'average_energy_consumption' => 'required|numeric',
        'solar_radiation_level' => 'required|numeric',
        'roof_dimensions_length' => 'required|numeric',
        'roof_dimensions_width' => 'required|numeric',
    ];

    public function mount(client $client)
    {
        $this->client = $client;
        $this->name = $client->name;
        $this->address = $client->address;
        $this->phone = $client->phone;
        $this->email = $client->email;
        $this->average_energy_consumption = $client->average_energy_consumption;
        $this->solar_radiation_level = $client->solar_radiation_level;
        $this->roof_dimensions_length = $client->roof_dimensions_length;
        $this->roof_dimensions_width = $client->roof_dimensions_width;
    }

    public function update()
    {
        $this->validate();

        // Actualizar el cliente en la base de datos
        $this->client->update([
            'name' => $this->name,
            'address' => $this->address,
            'phone' => $this->phone,
            'email' => $this->email,
            'average_energy_consumption' => $this->average_energy_consumption,
            'solar_radiation_level' => $this->solar_radiation_level,
            'roof_dimensions_length' => $this->roof_dimensions_length,
            'roof_dimensions_width' => $this->roof_dimensions_width,
        ]);

        $this->open_edit = false;
        $this->emitTo('clients.clients', 'render');
        $this->emit('alert', '¡Cliente Actualizado Exitosamente!');
    }

    public function render()
    {
        $clients = Client::all();

        return view('livewire.clients.client-edit', compact('clients'));
    }
}
