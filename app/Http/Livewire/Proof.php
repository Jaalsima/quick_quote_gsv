<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\AdditionalCost;
use Livewire\Component;
use App\Models\Client;
use App\Models\Project;
use App\Models\Labor;
use App\Models\Material;
use App\Models\Tool;
use App\Models\Transport;

class Proof extends Component
{
    public $currentSection = 1;
    public $sections = [
        1 => 'Client Details',
        2 => 'Project Details',
        3 => 'Labor Costs',
        4 => 'Material Costs',
        5 => 'Tool Costs',
        6 => 'Transportation Costs',
        7 => 'Additional Costs',
    ];

    // Datos de las secciones
    public $clientDetails = [];
    public $projectDetails = [];
    public $laborCosts = [];
    public $materialCosts = [];
    public $toolCosts = [];
    public $transportationCosts = [];
    public $additionalCosts = [];

    // Reglas de validación
    protected $rules = [
        'clientDetails.name' => 'required|string',
        'clientDetails.address' => 'required|string',
        'clientDetails.phone' => 'required|string',
        'clientDetails.email' => 'required|email',
        'clientDetails.average_energy_consumption' => 'required|numeric',
        'clientDetails.solar_radiation_level' => 'required|numeric',
        'clientDetails.roof_dimensions_length' => 'required|numeric',
        'clientDetails.roof_dimensions_width' => 'required|numeric',

        'projectDetails.project_name' => 'required|string',
        'projectDetails.project_type' => 'required|string',
        'projectDetails.description' => 'required|string',
        'projectDetails.required_kilowatts' => 'required|numeric',
        'projectDetails.start_date' => 'required|date',
        'projectDetails.expected_end_date' => 'required|date',

        'laborCosts.work_days_quantity' => 'required|numeric',
        'laborCosts.daily_total_cost' => 'required|numeric',

        'materialCosts.daily_total_cost' => 'required|numeric',

        'toolCosts.daily_total_cost' => 'required|numeric',

        'transportationCosts.daily_total_cost' => 'required|numeric',
        'transportationCosts.transportation_fare' => 'required|numeric',
    ];


    public function render()
    {
        return view('livewire.proof');
    }

    public function changeSection($section)
    {
        $this->currentSection = $section;
    }

    public function advanceToNextSection()
    {
        // Valida todos los datos antes de pasar a la siguiente sección
        $this->validate();

        // Guarda los datos en la base de datos o realiza la lógica necesaria
        // Aquí deberías usar los modelos correspondientes según la sección actual
        try {
            DB::transaction(function () {
                switch ($this->currentSection) {
                    case 1:
                        Client::create($this->clientDetails);
                        break;
                    case 2:
                        Project::create($this->projectDetails);
                        break;
                    case 3:
                        Labor::create($this->laborCosts);
                        break;
                    case 4:
                        Material::create($this->materialCosts);
                        break;
                    case 5:
                        Tool::create($this->toolCosts);
                        break;
                    case 6:
                        Transport::create($this->transportationCosts);
                        break;
                    case 7:
                        AdditionalCost::create($this->additionalCosts);
                        break;
                        // ... Agrega más casos según sea necesario
                }
            });
            // Reinicia los datos de la sección actual
            $this->resetSectionData();

            // Cambia a la siguiente sección
            $this->currentSection += 1;

            $this->dispatchBrowserEvent('show-toast', ['message' => 'Mensaje']);
        } catch (\Exception $e) {
            // Manejo de errores, puedes agregar un mensaje de error o realizar acciones específicas
            // Ejemplo: $this->dispatchBrowserEvent('show-toast', ['message' => 'Error al guardar la cotización']);
            Log::error('Error al guardar la cotización: ' . $e->getMessage(), [
                'section' => $this->currentSection,
                'data' => $this->getCurrentSectionData(),
            ]);
        }
    }


    // Reinicia los datos de la sección actual
    private function resetSectionData()
    {

        switch ($this->currentSection) {
            case 1:
                $this->clientDetails = [];
                break;
            case 2:
                $this->projectDetails = [];
                break;
            case 3:
                $this->laborCosts = [];
                break;
            case 4:
                $this->materialCosts = [];
                break;
            case 5:
                $this->toolCosts = [];
                break;
            case 6:
                $this->transportationCosts = [];
                break;
            case 7:
                $this->additionalCosts = [];
                break;
        }
    }
}
