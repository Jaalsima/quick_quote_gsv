<?php

namespace App\Http\Livewire\Projects;

use Livewire\Component;
use App\Models\Project;
use Livewire\WithPagination;

class Projects extends Component
{
    use WithPagination;

    public $search, $project;
    public $sort = "id";
    public $direction = "desc";
    public $perPage = 10;
    public $open = false;
    protected $listeners = ['render'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Project::query();

        // Condiciones de búsqueda
        if ($this->search) {
            $query->where('id', 'like', '%' . $this->search . '%')
                ->orWhere('project_name', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->orWhere('project_type', 'like', '%' . $this->search . '%');
        }

        $projects = $query->orderBy($this->sort, $this->direction)
            ->paginate($this->perPage);

        return view('livewire.projects.projects', compact('projects'));
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            $this->direction = ($this->direction == "desc") ? "asc" : "desc";
        } else {
            $this->sort = $sort;
            $this->direction = "asc";
        }
    }

    public function confirmDelete($projectId)
    {
        $this->project = Project::find($projectId);
        $this->open = true;
    }

    public function deleteConfirmed()
    {
        if ($this->project) {
            $this->project->delete();
            $this->emitTo('projects', 'render');
            $this->emit('alert', '¡Proyecto Eliminado!');
        }
        $this->open = false;
    }
}
