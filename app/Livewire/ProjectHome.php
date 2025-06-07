<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Project;
use Livewire\WithPagination;

class ProjectHome extends Component
{
    use WithPagination;

    public string $search = '';
    public bool $showModal = false;
    public ?int $selectedProject = null;

    protected $listeners = ['modalClosed' => 'closeModal'];

    public function create(): void
    {
        $this->selectedProject = null;
        $this->showModal = true;
    }

    public function edit(int $id): void
    {
        $this->selectedProject = $id;
        $this->showModal = true;
    }

    public function delete(int $id): void
    {
        Project::findOrFail($id)->delete();
        session()->flash('message', 'Project deleted successfully.');
    }

    public function closeModal(): void
    {
        $this->showModal = false;
        $this->resetPage();
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        $projects = Project::query()
            ->when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))
            ->orderBy('deadline', 'desc')
            ->paginate(10);

        return view('livewire.project-home', compact('projects'));
    }
}
