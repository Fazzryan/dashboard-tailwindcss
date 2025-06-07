<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Project;

class ProjectForm extends Component
{
    public ?int $projectId = null;
    public string $name = '';
    public string $status = '';
    public int $progress = 0;
    public string $client = '';
    public string $priority = '';
    public ?string $deadline = null;

    protected function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'status' => 'required|string|max:50',
            'progress' => 'required|integer|min:0|max:100',
            'client' => 'required|string|max:255',
            'priority' => 'required|string|max:50',
            'deadline' => 'required|date',
        ];
    }

    protected $listeners = ['loadProject', 'closeModal'];

    public function mount(int $projectId = null): void
    {
        if ($projectId) {
            $this->loadProject($projectId);
        }
    }

    public function loadProject(int $id): void
    {
        $project = Project::findOrFail($id);
        $this->projectId = $project->id;
        $this->name = $project->name;
        $this->status = $project->status;
        $this->progress = $project->progress;
        $this->client = $project->client;
        $this->priority = $project->priority;
        $this->deadline = $project->deadline->format('Y-m-d');
    }

    public function save(): void
    {
        $this->validate();

        $project = $this->projectId ? Project::findOrFail($this->projectId) : new Project();

        $project->fill([
            'name' => $this->name,
            'status' => $this->status,
            'progress' => $this->progress,
            'client' => $this->client,
            'priority' => $this->priority,
            'deadline' => $this->deadline,
        ]);

        $project->save();

        $this->dispatch('modalClosed'); // ⬅️ Livewire v3: kirim event ke parent
        session()->flash('message', 'Project saved successfully.');
    }

    public function closeModal(): void
    {
        $this->reset([
            'projectId', 'name', 'status', 'progress', 'client', 'priority', 'deadline'
        ]);

        $this->dispatch('modalClosed'); // ⬅️ Gantikan emitUp()
    }

    public function render()
    {
        return view('livewire.project-form');
    }
}
