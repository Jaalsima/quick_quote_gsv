<?php

namespace App\Http\Livewire\Quotations;

use Livewire\Component;
use App\Models\Quotation;
use App\Models\Project; // Importa el modelo Project
use App\Models\Client; // Importa el modelo Client
use Livewire\WithFileUploads;

class QuotationEdit extends Component
{
    use WithFileUploads;

    public $quotation;
    public $project_id, $client_id, $quotation_date, $validity_period, $total_quotation_amount;
    public $open_edit = false;

    protected $rules = [
        'project_id' => 'required|exists:projects,id',
        'client_id' => 'required|exists:clients,id',
        'quotation_date' => 'required|date',
        'validity_period' => 'required|numeric',
        'total_quotation_amount' => 'required|numeric',
    ];

    public function mount(Quotation $quotation)
    {
        $this->quotation = $quotation;
        $this->project_id = $quotation->project_id;
        $this->client_id = $quotation->client_id;
        $this->quotation_date = $quotation->quotation_date;
        $this->validity_period = $quotation->validity_period;
        $this->total_quotation_amount = $quotation->total_quotation_amount;
    }

    public function update()
    {
        $this->validate();

        // Actualizar la cotización en la base de datos
        $this->quotation->update([
            'project_id' => $this->project_id,
            'client_id' => $this->client_id,
            'quotation_date' => $this->quotation_date,
            'validity_period' => $this->validity_period,
            'total_quotation_amount' => $this->total_quotation_amount,
        ]);

        $this->open_edit = false;
        $this->emitTo('quotations.quotations', 'render');
        $this->emit('alert', '¡Cotización Actualizada Exitosamente!');
    }

    public function render()
    {
        $projects = Project::all(); // Obtén todos los proyectos
        $clients = Client::all(); // Obtén todos los clientes

        return view('livewire.quotations.quotation-edit', compact('projects', 'clients'));
    }
}
