<?php

namespace App\Livewire\Be\Projects;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Project as ProjectModel;

class Project extends Component
{
    use WithPagination;

    public string $search = '';
    public bool $showModal = false;
    public ?int $selectedProject = null;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $projects = ProjectModel::query()
            ->when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))
            ->orderBy('deadline', 'desc')
            ->paginate(10);

        return view('livewire.be.projects.project', compact('projects'));
    }
}
