<?php

namespace App\Http\Livewire\Projects;


use Livewire\Component;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Validation\Rule;

class projectCreate extends Component
{

    public $open_create = false;
    public $client_id;
    public $project_name;
    public $project_type;
    public $description;
    public $required_kilowatts;
    public $start_date;
    public $expected_end_date;

    public function render()
    {
        $projects = Project::all();
        $clients = Client::all();

        return view('livewire.projects.project-create', compact('projects', 'clients'));
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'client_id' => 'required|exists:clients,id',
            'project_name' => 'required',
            'project_type' => 'required',
            'description' => 'required',
            'required_kilowatts' => 'required|numeric',
            'start_date' => 'required|date',
            'expected_end_date' => 'required|date',
        ]);
    }

    public function saveProject()
    {
        $this->validate([
            'client_id' => 'required|exists:clients,id',
            'project_name' => 'required',
            'project_type' => 'required',
            'description' => 'required',
            'required_kilowatts' => 'required|numeric',
            'start_date' => 'required|date',
            'expected_end_date' => 'required|date',
        ]);

        project::create([

            'client_id' => $this->client_id,
            'project_name' => $this->project_name,
            'project_type' => $this->project_type,
            'description' => $this->description,
            'required_kilowatts' => $this->required_kilowatts,
            'start_date' => $this->start_date,
            'expected_end_date' => $this->expected_end_date,
        ]);

        $this->reset();
        $this->emit('alert', '¡Proyecto creado exitosamente!');
    }
}
