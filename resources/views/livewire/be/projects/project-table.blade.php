<div>
    <!-- Search and Add Section -->
    <div class="p-6 mb-5 bg-white border shadow-sm border-primary-100 rounded-2xl">
        <div class="flex flex-col items-center justify-between gap-4 sm:flex-row">
            <!-- Search -->
            <div class="flex-1 w-full md:max-w-md">
                <div class="relative">
                    <input type="text" placeholder="Search projects..." wire:model.live="search"
                        class="w-full py-3 pl-10 pr-4 text-sm transition duration-200 ease-in-out border border-primary-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-400 focus:border-transparent bg-white/80 lg:text-sm">
                    <svg class="absolute w-5 h-5 text-gray-400 transform -translate-y-1/2 left-3 top-1/2" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>

            <!-- Add Project Button -->
            <button x-data @click="$wire.showModal = true"
                class="flex items-center px-6 py-3 space-x-1 font-medium text-white transition-all duration-150 shadow-lg md:max-w-md bg-primary-400 hover:bg-primary-500 focus:ring-2 focus:ring-primary-300 rounded-xl hover:shadow-xl">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                <span class="text-sm">Add Project</span>
            </button>
        </div>
    </div>

    <div class="mb-4">
        @include('be.layouts.app_session')
    </div>

    <!-- Projects Table -->
    <div class="overflow-hidden bg-white border border-b-0 shadow-sm border-primary-100 rounded-t-2xl">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-white border-b shadow-sm border-primary-100">
                    <tr>
                        <th
                            class="px-6 py-4 text-xs font-semibold tracking-wider text-left uppercase text-slate-600 md:text-sm">
                            No
                        </th>
                        <th
                            class="px-6 py-4 text-xs font-semibold tracking-wider text-left uppercase text-slate-600 md:text-sm">
                            Project Name
                        </th>
                        <th
                            class="px-6 py-4 text-xs font-semibold tracking-wider text-left uppercase text-slate-600 md:text-sm">
                            Status
                        </th>
                        <th
                            class="px-6 py-4 text-xs font-semibold tracking-wider text-left uppercase text-slate-600 md:text-sm">
                            Progress
                        </th>
                        <th
                            class="px-6 py-4 text-xs font-semibold tracking-wider text-left uppercase text-slate-600 md:text-sm">
                            Client
                        </th>
                        <th
                            class="px-6 py-4 text-xs font-semibold tracking-wider text-left uppercase text-slate-600 md:text-sm">
                            Priority
                        </th>
                        <th
                            class="px-6 py-4 text-xs font-semibold tracking-wider text-left uppercase text-slate-600 md:text-sm">
                            Deadline
                        </th>
                        <th
                            class="px-6 py-4 text-xs font-semibold tracking-wider text-right uppercase text-slate-600 md:text-sm">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200/50">
                    @forelse ($projects as $project)
                        <tr class="border-t">
                            <td class="px-6 py-4 text-sm whitespace-nowrap">
                                {{ ($projects->currentPage() - 1) * $projects->perPage() + $loop->iteration }}
                            </td>
                            <td class="px-6 py-4 text-sm whitespace-nowrap">{{ $project->name }}</td>
                            <td class="px-6 py-4 text-sm whitespace-nowrap">{{ $project->status }}</td>
                            <td class="px-6 py-4 text-sm whitespace-nowrap">{{ $project->progress }}%</td>
                            <td class="px-6 py-4 text-sm whitespace-nowrap">{{ $project->client }}</td>
                            <td class="px-6 py-4 text-sm whitespace-nowrap">
                                @php
                                    $priorityClasses = [
                                        'High' => 'bg-red-100 text-red-800',
                                        'Medium' => 'bg-yellow-100 text-yellow-800',
                                        'Low' => 'bg-green-100 text-green-800',
                                    ];
                                @endphp
                                <span
                                    class="inline-flex px-3 py-1 text-xs font-medium text-red-800 bg-red-100 rounded-xl {{ $priorityClasses[$project->priority] ?? 'bg-gray-100 text-gray-800' }}">
                                    {{ $project->priority }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm whitespace-nowrap">{{ $project->deadline }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                <button x-data @click="$wire.showModalEdit = true"
                                    wire:click="confirmEdit({{ $project->id }})"
                                    class="p-2 font-semibold transition-colors text-primary-600 hover:text-slate-600 rounded-xl hover:bg-primary-50">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                        </path>
                                    </svg>
                                </button>
                                {{--  wire:click="delete({{ $project->id }}) --}}
                                <button x-data @click="$wire.showModalDelete = true"
                                    wire:click="confirmDelete({{ $project->id }}, '{{ $project->name }}')"
                                    class="p-2 text-red-600 transition-colors hover:text-red-900 rounded-xl hover:bg-red-50">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">
                                <div class="py-12 text-center">
                                    <svg class="w-12 h-12 mx-auto text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 48 48">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 11H5a2 2 0 00-2 2v6a2 2 0 002 2h14m-5 10v-2.5a3.5 3.5 0 117 0V35a3 3 0 01-3 3H9a3 3 0 01-3-3v-6h2.5" />
                                    </svg>
                                    <h3 class="mt-4 text-sm font-medium text-gray-900">No projects found</h3>
                                    <p class="mt-2 text-sm text--500">Started by creating a new project.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="p-4 bg-white border shadow-sm border-primary-100 rounded-b-2xl">
        <div class="flex items-center justify-between">
            {{-- Info Pagination di Kiri --}}
            <div>
                <p class="text-sm text-gray-700">
                    Menampilkan
                    <span class="font-medium">{{ $projects->firstItem() }}</span>
                    hingga
                    <span class="font-medium">{{ $projects->lastItem() }}</span>
                    dari
                    <span class="font-medium">{{ $projects->total() }}</span>
                    item
                </p>
            </div>

            {{-- Navigasi Halaman di Kanan --}}
            <div class="flex space-x-2">
                {{-- Tombol Previous --}}
                @if ($projects->onFirstPage())
                    <span
                        class="px-3 py-1 text-sm text-gray-600 bg-gray-100 border border-gray-200 rounded-lg">Previous</span>
                @else
                    <button wire:click="previousPage"
                        class="px-3 py-1 text-sm text-white duration-150 rounded-lg bg-primary-400 hover:bg-primary-500">Previous</button>
                @endif

                {{-- Tombol Nomor Halaman --}}
                @for ($page = 1; $page <= $projects->lastPage(); $page++)
                    @if ($page == $projects->currentPage())
                        <span
                            class="px-3 py-1 text-sm border rounded-lg text-primary-500 bg-primary-100 border-primary-300">{{ $page }}</span>
                    @else
                        <button wire:click="gotoPage({{ $page }})"
                            class="px-3 py-1 text-sm duration-150 bg-white border rounded-lg hover:bg-primary-100 hover:border-primary-200 hover:text-primary-500">
                            {{ $page }}
                        </button>
                    @endif
                @endfor

                {{-- Tombol Next --}}
                @if ($projects->hasMorePages())
                    <button wire:click="nextPage"
                        class="px-3 py-1 text-sm text-white duration-150 rounded-lg bg-primary-400 hover:bg-primary-500">Next</button>
                @else
                    <span
                        class="px-3 py-1 text-sm text-gray-600 bg-gray-100 border border-gray-200 rounded-lg">Next</span>
                @endif
            </div>
        </div>
    </div>

    {{-- Modal Add --}}
    <div x-data="{ show: @entangle('showModal') }">
        <div x-show="show" x-transition:enter="transition-opacity ease-in-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-in-out duration-500" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 z-40 bg-black bg-opacity-50"
            style="display: none;">
        </div>

        <div x-show="show" x-transition.duration.250ms
            class="fixed top-0 left-0 right-0 z-50 items-center justify-center w-full overflow-x-hidden overflow-y-auto md:inset-0"
            style="display: none">
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div
                    class="inline-block px-4 pt-5 pb-4 overflow-hidden text-left align-bottom transition-all transform bg-white shadow rounded-3xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">

                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Add New Project</h3>
                        <button @click="show = false; $wire.closeModal()"
                            class="p-1 text-gray-400 hover:text-gray-600 rounded-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <!-- Divider / Garis Bawah -->
                    <hr class="my-4 border-gray-200">

                    <form wire:submit="save" class="space-y-4">
                        <div>
                            <label class="block mb-3 text-sm font-medium text-gray-700">Project Name</label>
                            <input type="text" wire:model="name"
                                class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-lg  focus:ring-2 focus:outline-none focus:ring-primary-400 focus:border-transparent transition duration-200 ease-in-out">
                            @error('name')
                                <div class="mt-2 text-sm italic text-red-500">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-3 text-sm font-medium text-gray-700">Client</label>
                                <input type="text" wire:model="client"
                                    class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-lg  focus:ring-2 focus:outline-none focus:ring-primary-400 focus:border-transparent transition duration-200 ease-in-out">
                                @error('client')
                                    <div class="mt-2 text-sm italic text-red-500">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-3 text-sm font-medium text-gray-700">Priority</label>
                                <select wire:model="priority"
                                    class="w-full px-2 py-2.5 text-sm border block border-gray-300 rounded-lg    focus:ring-2 focus:outline-none focus:ring-primary-400 focus:border-transparent transition duration-200 ease-in-out">
                                    <option value="Low">Low</option>
                                    <option value="Medium">Medium</option>
                                    <option value="High">High</option>
                                </select>
                                @error('priority')
                                    <div class="mt-2 text-sm italic text-red-500">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-3 text-sm font-medium text-gray-700">Status</label>
                                <select wire:model="status"
                                    class="w-full px-2 py-2.5 text-sm border border-gray-300 rounded-lg  focus:ring-2 focus:outline-none focus:ring-primary-400 focus:border-transparent transition duration-200 ease-in-out">
                                    <option value="Active">Active</option>
                                    <option value="On Hold">On Hold</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Cancelled">Cancelled</option>
                                </select>
                                @error('status')
                                    <div class="mt-2 text-sm italic text-red-500">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-3 text-sm font-medium text-gray-700">Progress (%)</label>
                                <input type="number" min="0" max="100" wire:model="progress"
                                    class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-lg  focus:ring-2 focus:outline-none focus:ring-primary-400 focus:border-transparent transition duration-200 ease-in-out">
                                @error('progress')
                                    <div class="mt-2 text-sm italic text-red-500">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="pb-3">
                            <label class="block mb-3 text-sm font-medium text-gray-700">Deadline</label>
                            <input type="date" wire:model="deadline"
                                class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-lg  focus:ring-2 focus:outline-none focus:ring-primary-400 focus:border-transparent transition duration-200 ease-in-out">
                            @error('deadline')
                                <div class="mt-2 text-sm italic text-red-500">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Divider / Garis Bawah -->
                        <hr class="border-gray-200 ">

                        <div class="flex justify-end space-x-2">
                            <button type="button" @click="show = false; $wire.closeModal()"
                                class="px-3.5 py-2.5 text-sm text-gray-700 transition-colors border border-gray-300 rounded-xl hover:bg-gray-100 focus:ring-1 focus:ring-gray-300">
                                Cancel
                            </button>
                            <button type="submit"
                                class="px-3.5 py-2.5 text-sm text-white transition-colors bg-primary-400 rounded-xl hover:bg-primary-500 focus:ring-2 focus:ring-primary-300">
                                Add Project
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Edit --}}
    <div x-data="{ show: @entangle('showModalEdit') }">
        <div x-show="show" x-transition:enter="transition-opacity ease-in-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-in-out duration-500" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 z-40 bg-black bg-opacity-50"
            style="display: none;">
        </div>

        <div x-show="show" x-transition.duration.250ms
            class="fixed top-0 left-0 right-0 z-50 items-center justify-center w-full overflow-x-hidden overflow-y-auto md:inset-0"
            style="display: none">
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div
                    class="inline-block px-4 pt-5 pb-4 overflow-hidden text-left align-bottom transition-all transform bg-white shadow rounded-3xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">

                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Edit Project</h3>
                        <button @click="show = false; $wire.closeModalEdit()"
                            class="p-1 text-gray-400 hover:text-gray-600 rounded-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <!-- Divider / Garis Bawah -->
                    <hr class="my-4 border-gray-200">

                    <form wire:submit="update" class="space-y-4">
                        <div>
                            <label class="block mb-3 text-sm font-medium text-gray-700">Project Name</label>
                            <input type="text" wire:model="name"
                                class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-lg  focus:ring-2 focus:outline-none focus:ring-primary-400 focus:border-transparent transition duration-200 ease-in-out">
                            @error('name')
                                <div class="mt-2 text-sm italic text-red-500">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-3 text-sm font-medium text-gray-700">Client</label>
                                <input type="text" wire:model="client"
                                    class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-lg  focus:ring-2 focus:outline-none focus:ring-primary-400 focus:border-transparent transition duration-200 ease-in-out">
                                @error('client')
                                    <div class="mt-2 text-sm italic text-red-500">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-3 text-sm font-medium text-gray-700">Priority</label>
                                <select wire:model="priority"
                                    class="w-full px-2 py-2.5 text-sm border block border-gray-300 rounded-lg    focus:ring-2 focus:outline-none focus:ring-primary-400 focus:border-transparent transition duration-200 ease-in-out">
                                    <option value="Low">Low</option>
                                    <option value="Medium">Medium</option>
                                    <option value="High">High</option>
                                </select>
                                @error('priority')
                                    <div class="mt-2 text-sm italic text-red-500">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-3 text-sm font-medium text-gray-700">Status</label>
                                <select wire:model="status"
                                    class="w-full px-2 py-2.5 text-sm border border-gray-300 rounded-lg  focus:ring-2 focus:outline-none focus:ring-primary-400 focus:border-transparent transition duration-200 ease-in-out">
                                    <option value="Active">Active</option>
                                    <option value="On Hold">On Hold</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Cancelled">Cancelled</option>
                                </select>
                                @error('status')
                                    <div class="mt-2 text-sm italic text-red-500">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-3 text-sm font-medium text-gray-700">Progress (%)</label>
                                <input type="number" min="0" max="100" wire:model="progress"
                                    class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-lg  focus:ring-2 focus:outline-none focus:ring-primary-400 focus:border-transparent transition duration-200 ease-in-out">
                                @error('progress')
                                    <div class="mt-2 text-sm italic text-red-500">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="pb-3">
                            <label class="block mb-3 text-sm font-medium text-gray-700">Deadline</label>
                            <input type="date" wire:model="deadline"
                                class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-lg  focus:ring-2 focus:outline-none focus:ring-primary-400 focus:border-transparent transition duration-200 ease-in-out">
                            @error('deadline')
                                <div class="mt-2 text-sm italic text-red-500">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Divider / Garis Bawah -->
                        <hr class="border-gray-200 ">

                        <div class="flex justify-end space-x-2">
                            <button type="button" @click="show = false; $wire.closeModalEdit()"
                                class="px-3.5 py-2.5 text-sm text-gray-700 transition-colors border border-gray-300 rounded-xl hover:bg-gray-100 focus:ring-1 focus:ring-gray-300">
                                Cancel
                            </button>
                            <button type="submit"
                                class="px-3.5 py-2.5 text-sm text-white transition-colors bg-primary-400 rounded-xl hover:bg-primary-500 focus:ring-2 focus:ring-primary-300">
                                Edit Project
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Delete --}}
    <div x-data="{ show: @entangle('showModalDelete') }">
        <div x-show="show" x-transition:enter="transition-opacity ease-in-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-in-out duration-500" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 z-40 bg-black bg-opacity-50"
            style="display: none;">
        </div>

        <div x-show="show" x-transition.duration.250ms
            class="fixed top-0 left-0 right-0 z-50 items-center justify-center w-full overflow-x-hidden overflow-y-auto md:inset-0"
            style="display: none">
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div
                    class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white shadow rounded-3xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-10">

                    <form wire:submit="delete" class="space-y-4 text-center">
                        <!-- Icon -->
                        <div class="flex items-center justify-center w-12 h-12 mx-auto mb-4 bg-red-100 rounded-full">
                            <svg class="w-6 h-6 text-red-600" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                            </svg>
                        </div>

                        <!-- Teks -->
                        <h3 class="mb-1 text-lg font-medium text-gray-900">
                            Confirm Delete
                        </h3>
                        <p class="mb-4 text-sm text-gray-500">
                            Are you sure you want to delete <strong>{{ $projectName }}</strong> project?
                            {{ $project_id }} This
                            action cannot be
                            undone.
                        </p>

                        <div class="flex justify-center pt-3 space-x-2">
                            <button type="button" @click="show = false;"
                                class="px-4 py-2.5 text-sm text-gray-700 transition-colors border border-gray-300 rounded-xl hover:bg-gray-100 focus:ring-1 focus:ring-gray-300">
                                Cancel
                            </button>
                            <button type="submit"
                                class="px-4 py-2.5 text-sm text-white transition-colors bg-rose-400 rounded-xl hover:bg-rose-500 focus:ring-2 focus:ring-rose-300">
                                Delete Project
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
