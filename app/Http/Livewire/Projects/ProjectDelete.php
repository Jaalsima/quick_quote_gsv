<?php

namespace App\Http\Livewire\Projects;

use Livewire\Component;

class ProjectDelete extends Component
{
    public $open = false;
    public $project;

    public function render()
    {
        return view('livewire.projects.project-delete');
    }

    public function deleteConfirmed()
    {
        if ($this->project) {
            $this->project->delete();
            $this->emitTo('projects.projects', 'render');
            $this->emit('alert', '¡Proyecto Eliminado!');
        }
        $this->open = false;
    }
}
