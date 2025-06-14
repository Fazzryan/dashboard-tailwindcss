<?php

namespace App\Livewire\Be\Projects;

use App\Models\Project;
use Livewire\Component;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\WithPagination;

class ProjectTable extends Component
{
    use WithPagination;

    public $search = '';
    public $showModal = false;
    public $showModalEdit = false;
    public $showModalDelete = false;

    public $perPage = 10;

    public $project_id;
    public $projectName;

    public $name;
    public $description;
    public $client;
    public $priority = 'low';
    public $status = 'active';
    public $progress;
    public $deadline;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    // Untuk reset halaman saat perPage berubah
    public function updatedPerPage()
    {
        $this->resetPage();
    }

    // -------------------------------
    // Fungsi Modal
    // --------------------------------
    public function resetFormModal()
    {
        $this->project_id = null;
        $this->reset([
            'name',
            'client',
            'priority',
            'progress',
            'status',
            'deadline'
        ]);
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function closeModalEdit()
    {
        $this->showModalEdit = false;
        $this->project_id = null;
        $this->projectName = null;
        $this->resetFormModal();
    }

    public function closeModalDelete()
    {
        $this->showModalDelete = false;
    }

    // -------------------------------
    // Fungsi Add
    // --------------------------------
    public function save()
    {
        $validate = $this->validate([
            'name' => 'required|string|unique:projects,name|max:255',
            'client' => 'required|string|max:255',
            'priority' => 'required',
            'progress' => 'required',
            'status' => 'required',
            'deadline' => 'required',
        ]);

        if ($validate) {
            Project::create($validate);
            $this->resetFormModal();
            $this->showModal = false;
            return redirect()->back()->with('success', 'Project created successfully!');
        }
    }

    // -------------------------------
    // Fungsi Update
    // --------------------------------

    public function confirmEdit($id)
    {
        $this->project_id = $id;
        $this->showModalEdit = true;

        $project = Project::find($id);
        if ($project) {
            $this->name = $project->name;
            $this->client = $project->client;
            $this->priority = $project->priority;
            $this->progress = $project->progress;
            $this->status = $project->status;
            $this->deadline = $project->deadline;
        }
    }

    public function update()
    {
        $project = Project::find($this->project_id);
        $validate = $this->validate([
            'name' => 'required|string|max:255|unique:projects,name,' . $project->id,
            'client' => 'required|string|max:255',
            'priority' => 'required',
            'progress' => 'required',
            'status' => 'required',
            'deadline' => 'required',
        ]);

        if ($validate) {

            if ($project) {
                $project->update($validate);
                $this->showModalEdit = false;
                return redirect()->back()->with('success', 'Project updated successfully!');
            }

            $this->showModalEdit = false;
            return redirect()->back()->with('warning', 'Project not found!');
        }
    }

    // -------------------------------
    // Fungsi Delete
    // --------------------------------
    public function confirmDelete($id, $name)
    {
        $this->project_id = $id;
        $this->projectName = $name;
    }

    public function delete()
    {
        $project = Project::find($this->project_id);

        if ($project) {
            $project->delete();
            $this->showModalDelete = false;
            return redirect()->back()->with('success', 'Project deleted successfully!');
        }

        $this->showModalDelete = false;
        return redirect()->back()->with('warning', 'Project not found!');
    }

    public function render()
    {
        $query = Project::query()
            ->when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))
            ->orderBy('created_at', 'desc');

        if ($this->perPage === 'all') {
            // Ambil semua data
            $allProjects = $query->get();

            // Buat paginator manual untuk "all" agar tetap kompatibel dengan view
            $projects = new LengthAwarePaginator(
                $allProjects, // items
                $allProjects->count(), // total
                $allProjects->count(), // perPage (sama dengan total)
                1, // currentPage
                [
                    'path' => request()->url(),
                    'pageName' => 'page',
                ]
            );
        } else {
            $projects = $query->paginate($this->perPage);
        }

        return view('livewire.be.projects.project-table', compact('projects'));
    }
}
