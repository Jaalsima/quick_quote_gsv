<?php

namespace App\Http\Livewire\Clients;

use Livewire\Component;
use App\Models\Client;

class ClientDelete extends Component
{
    public $open = false;
    public $client;

    public function render()
    {
        return view('livewire.clients.client-delete');
    }

    public function deleteConfirmed()
    {
        if ($this->client) {
            $this->client->delete();
            $this->emitTo('clients.clients', 'render');
            $this->emit('alert', '¡Cliente Eliminado!');
        }
        $this->open = false;
    }
}
