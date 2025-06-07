<div>
    <div class="flex items-center justify-between mb-4">
        <input type="text" wire:model.live="search" placeholder="Search project..."
            class="w-1/3 px-3 py-1 border rounded" />
        <button wire:click="create" class="px-4 py-2 text-white bg-blue-600 rounded">+ Add Project</button>
    </div>

    <table class="min-w-full bg-white rounded shadow">
        <thead>
            <tr>
                <th class="p-2 text-left">Project</th>
                <th class="p-2 text-left">Status</th>
                <th class="p-2 text-left">Progress</th>
                <th class="p-2 text-left">Client</th>
                <th class="p-2 text-left">Priority</th>
                <th class="p-2 text-left">Deadline</th>
                <th class="p-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
                <tr class="border-t">
                    <td class="p-2">{{ $project->name }}</td>
                    <td class="p-2">{{ $project->status }}</td>
                    <td class="p-2">{{ $project->progress }}%</td>
                    <td class="p-2">{{ $project->client }}</td>
                    <td class="p-2">{{ $project->priority }}</td>
                    <td class="p-2">{{ $project->deadline }}</td>
                    <td class="p-2 space-x-2">
                        <button wire:click="edit({{ $project->id }})" class="text-blue-600">Edit</button>
                        <button wire:click="delete({{ $project->id }})" class="text-red-600">Delete</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="p-2 text-center text-gray-500">No projects found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $projects->links() }}

    {{-- Modal --}}
    @if ($showModal)
        @livewire('project-form', ['projectId' => $selectedProject?->id ?? null], key($selectedProject?->id ?? 'new'))
    @endif
</div>
