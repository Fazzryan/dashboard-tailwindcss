<?php

namespace App\Livewire\Be\Projects;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Response;
use Illuminate\Pagination\LengthAwarePaginator;

class ProjectTable extends Component
{
    use WithPagination;

    public $search = '';
    public $showModal = false;
    public $showModalEdit = false;
    public $showModalDelete = false;
    public $showModalExport = false;

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

    // Kolom yang bisa diexport
    public $exportableColumns = [
        'id' => 'ID',
        'name' => 'Name',
        'client' => 'Client',
        'status' => 'Status',
        'priority' => 'Priority',
        'deadline' => 'Deadline',
        'progress' => 'Progress',
        'created_at' => 'Created At',
    ];

    public $selectedColumns = [];
    public $exportPerPage = 10;

    public function mount()
    {
        $this->selectedColumns = array_keys($this->exportableColumns); // default semua kolom dipilih
    }

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

    public function closeModalExport()
    {
        $this->showModalExport = false;
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

    public function exportSelectedData()
    {
        $query = Project::query()
            ->when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))
            ->orderBy('created_at', 'desc');

        $fileName = 'projects_export_' . now()->format('Y-m-d_H-i-s') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];

        $callback = function () use ($query) {
            $file = fopen('php://output', 'w');

            // Header CSV
            fputcsv($file, array_intersect_key(
                $this->exportableColumns,
                array_flip($this->selectedColumns)
            ));

            // Data Rows
            $limit = $this->exportPerPage === 'all' ? null : $this->exportPerPage;

            if ($limit) {
                $data = $query->take($limit)->get();
            } else {
                $data = $query->get();
            }

            foreach ($data as $project) {
                $row = [];

                foreach ($this->selectedColumns as $col) {
                    $value = $project->{$col};

                    if ($col === 'progress') {
                        $value .= '%';
                    }

                    $row[] = $value;
                }

                fputcsv($file, $row);
            }

            fclose($file);
        };

        return Response::streamDownload($callback, $fileName, $headers);
    }

    // public function exportToCsv()
    // {
    //     // Query ulang untuk ambil semua data tanpa paginasi
    //     $query = Project::query()
    //         ->when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))
    //         ->orderBy('created_at', 'desc');

    //     $fileName = 'projects_export_' . now()->format('Y-m-d_H-i-s') . '.csv';

    //     $headers = [
    //         'Content-Type' => 'text/csv',
    //         'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
    //     ];

    //     $callback = function () use ($query) {
    //         $file = fopen('php://output', 'w');

    //         // Header CSV
    //         fputcsv($file, ['ID', 'Name', 'Client', 'Status', 'Priority', 'Deadline', 'Progress', 'Created At']);

    //         // Data Rows
    //         $query->chunkById(200, function ($projects) use ($file) {
    //             foreach ($projects as $project) {
    //                 fputcsv($file, [
    //                     $project->id,
    //                     $project->name,
    //                     $project->client,
    //                     $project->status,
    //                     $project->priority,
    //                     $project->deadline,
    //                     $project->progress . '%',
    //                     $project->created_at,
    //                 ]);
    //             }
    //         });

    //         fclose($file);
    //     };

    //     return Response::streamDownload($callback, $fileName, $headers);
    // }
}
