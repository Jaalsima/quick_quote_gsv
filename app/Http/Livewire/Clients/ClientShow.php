<?php

namespace App\Http\Livewire\Clients;

use Livewire\Component;
use App\Models\Client;

class ClientShow extends Component
{
    public $client;
    public $open_client = false;

    public function mount(Client $client)
    {
        $this->client = $client;
    }

    public function render()
    {
        return view('livewire.clients.client-show');
    }
}
