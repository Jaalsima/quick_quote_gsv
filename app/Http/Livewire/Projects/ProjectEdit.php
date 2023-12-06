<?php

namespace App\Http\Livewire\projects;

use App\Models\Client;
use Livewire\Component;
use App\Models\Project;
use Livewire\WithFileUploads;

class projectEdit extends Component
{
    use WithFileUploads;
    public $open_edit = false;
    public $project;
    public $client_id;
    public $project_name;
    public $project_type;
    public $description;
    public $required_kilowatts;
    public $start_date;
    public $expected_end_date;

    protected $rules = [
        'client_id' => 'required|exists:clients,id',
        'project_name' => 'required',
        'project_type' => 'required',
        'description' => 'required',
        'required_kilowatts' => 'required|numeric',
        'start_date' => 'required|date',
        'expected_end_date' => 'required|date',
    ];

    public function mount(Project $project)
    {
        $this->project = $project;
        $this->client_id = $project->client_id;
        $this->project_name = $project->project_name;
        $this->project_type = $project->project_type;
        $this->description = $project->description;
        $this->required_kilowatts = $project->required_kilowatts;
        $this->start_date = $project->start_date;
        $this->expected_end_date = $project->expected_end_date;
    }

    public function update()
    {
        $this->validate();

        // Actualizar el proyecto en la base de datos
        $this->project->update([
            'client_id' => $this->client_id,
            'project_name' => $this->project_name,
            'project_type' => $this->project_type,
            'description' => $this->description,
            'required_kilowatts' => $this->required_kilowatts,
            'start_date' => $this->start_date,
            'expected_end_date' => $this->expected_end_date,

        ]);

        $this->open_edit = false;
        $this->emitTo('projects.projects', 'render');
        $this->emit('alert', '¡Proyecto Actualizado Exitosamente!');
    }

    public function render()
    {
        $projects = Project::all();
        $clients = Client::all();

        return view('livewire.projects.project-edit', compact('projects', 'clients'));
    }
}
