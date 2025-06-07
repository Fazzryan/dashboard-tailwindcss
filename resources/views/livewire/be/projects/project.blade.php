<div>
    <!-- Search and Add Section -->
    <div class="p-6 mb-5 bg-white border shadow-sm border-primary-100 rounded-2xl">
        <div class="flex flex-col items-center justify-between gap-4 sm:flex-row">
            <!-- Search -->
            <div class="flex-1 max-w-md">
                <div class="relative">
                    <input type="text" placeholder="Search projects..." wire:model.live="search"
                        class="w-full py-3 pl-10 pr-4 text-sm border border-primary-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent bg-white/80 lg:text-sm">
                    <svg class="absolute w-5 h-5 text-gray-400 transform -translate-y-1/2 left-3 top-1/2" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>

            <!-- Add Project Button -->
            <button
                class="flex items-center px-6 py-3 space-x-1 font-medium text-white transition-all shadow-lg bg-gradient-to-r from-primary-500 to-purple-500 hover:from-primary-600 hover:to-purple-600 rounded-xl hover:shadow-xl">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                <span class="text-sm">Add Project</span>
            </button>
        </div>
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
                                <button wire:click="edit({{ $project->id }})"
                                    class="p-2 font-semibold transition-colors text-primary-600 hover:text-slate-600 rounded-xl hover:bg-primary-50">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                        </path>
                                    </svg>
                                </button>
                                <button wire:click="delete({{ $project->id }})"
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
                    <span class="px-3 py-1 text-sm text-gray-600 bg-gray-300 rounded-lg">Previous</span>
                @else
                    <button wire:click="previousPage"
                        class="px-3 py-1 text-sm text-white rounded-lg bg-primary-500 hover:bg-primary-600">Previous</button>
                @endif

                {{-- Tombol Nomor Halaman --}}
                @for ($page = 1; $page <= $projects->lastPage(); $page++)
                    @if ($page == $projects->currentPage())
                        <span class="px-3 py-1 text-sm text-white rounded-lg bg-primary-700">{{ $page }}</span>
                    @else
                        <button wire:click="gotoPage({{ $page }})"
                            class="px-3 py-1 text-sm bg-white border rounded-lg hover:bg-gray-100">
                            {{ $page }}
                        </button>
                    @endif
                @endfor

                {{-- Tombol Next --}}
                @if ($projects->hasMorePages())
                    <button wire:click="nextPage"
                        class="px-3 py-1 text-sm text-white rounded-lg bg-primary-500 hover:bg-primary-600">Next</button>
                @else
                    <span class="px-3 py-1 text-sm text-gray-600 bg-gray-300 rounded-lg">Next</span>
                @endif
            </div>
        </div>
    </div>
</div>
