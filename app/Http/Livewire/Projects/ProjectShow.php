<?php

namespace App\Http\Livewire\projects;

use Livewire\Component;
use App\Models\Project;

class ProjectShow extends Component
{
    public $project;
    public $open_project = false;

    public function mount(Project $project)
    {
        $this->project = $project;
    }

    public function render()
    {
        return view('livewire.projects.project-show');
    }
}
