@extends('be.layouts.app_main')

@push('meta-seo')
    <meta name="description"
        content="Projects management dashboard with modern interface and comprehensive project tracking.">
    <meta name="keywords" content="Projects, management, dashboard, Laravel, Vue.js">
    <meta name="author" content="Your Name">
    <title>Projects - Admin Panel</title>
@endpush

@push('custom-css')
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
@endpush

@section('content')
    <!-- Alpine.js State -->
    <div>
        <!-- Header -->
        <div class="mb-8">
            <h1 class="mb-2 text-2xl font-semibold text-gray-800">Projects</h1>
            <p class="text-gray-600">Manage and track your projects efficiently</p>
        </div>

        <!-- Search and Add Section -->
        <div class="p-6 mb-8 bg-white border shadow-sm border-primary-100 rounded-2xl">
            <div class="flex flex-col items-center justify-between gap-4 sm:flex-row">
                {{-- <!-- Search -->
                <div class="flex-1 max-w-md">
                    <div class="relative">
                        <input type="text" placeholder="Search projects..." x-model="searchQuery"
                            @input="currentPage = 1"
                            class="w-full py-3 pl-10 pr-4 text-sm border border-primary-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white/80 lg:text-sm">
                        <svg class="absolute w-5 h-5 text-gray-400 transform -translate-y-1/2 left-3 top-1/2" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>

                <!-- Add Project Button -->
                <button @click="openModal()"
                    class="flex items-center px-6 py-3 space-x-2 font-medium text-white transition-all shadow-lg bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 rounded-xl hover:shadow-xl">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <span class="text-sm lg:text-sm">Add Project</span>
                </button> --}}
                <livewire:project-form />

            </div>
        </div>

        <!-- Projects Table -->
        <div class="overflow-hidden bg-white border shadow-sm border-primary-100 rounded-2xl">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-indigo-200/50">
                        <tr>
                            <th
                                class="px-6 py-4 text-xs font-medium tracking-wider text-left uppercase text-primary-900 md:text-sm">
                                Project Name
                            </th>
                            <th
                                class="px-6 py-4 text-xs font-medium tracking-wider text-left uppercase text-primary-900 md:text-sm">
                                Status
                            </th>
                            <th
                                class="px-6 py-4 text-xs font-medium tracking-wider text-left uppercase text-primary-900 md:text-sm">
                                Progress
                            </th>
                            <th
                                class="px-6 py-4 text-xs font-medium tracking-wider text-left uppercase text-primary-900 md:text-sm">
                                Client
                            </th>
                            <th
                                class="px-6 py-4 text-xs font-medium tracking-wider text-left uppercase text-primary-900 md:text-sm">
                                Priority
                            </th>
                            <th
                                class="px-6 py-4 text-xs font-medium tracking-wider text-left uppercase text-primary-900 md:text-sm">
                                Deadline
                            </th>
                            <th
                                class="px-6 py-4 text-xs font-medium tracking-wider text-right uppercase text-primary-900 md:text-sm">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200/50">
                        <template x-for="project in paginatedProjects" :key="project.id">
                            <tr class="transition-colors duration-200 table-hover">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div>
                                        <div class="text-sm font-medium text-gray-900" x-text="project.name"></div>
                                        <div class="text-sm text--500" primary-9ext="project.description"></div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex px-3 py-1 text-xs font-medium rounded-xl"
                                        :class="{
                                            'bg-green-100 text-green-800': project.status === 'Active',
                                            'bg-blue-100 text-blue-800': project.status === 'Completed',
                                            'bg-yellow-100 text-yellow-800': project.status === 'On Hold',
                                            'bg-red-100 text-red-800': project.status === 'Cancelled'
                                        }"
                                        x-text="project.status"></span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-16 h-2 mr-3 bg-gray-200 rounded-xl">
                                            <div class="h-2 transition-all duration-300 bg-gradient-to-r from-blue-500 to-purple-500 rounded-xl"
                                                :style="`width: ${project.progress}%`"></div>
                                        </div>
                                        <span class="text-sm text-gray-600" x-text="`${project.progress}%`"></span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap" x-text="project.client">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex px-3 py-1 text-xs font-medium rounded-xl"
                                        :class="{
                                            'bg-red-100 text-red-800': project.priority === 'High',
                                            'bg-yellow-100 text-yellow-800': project.priority === 'Medium',
                                            'bg-green-100 text-green-800': project.priority === 'Low'
                                        }"
                                        x-text="project.priority"></span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap" x-text="project.deadline">
                                </td>
                                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                    <div class="flex justify-end space-x-2">
                                        <button @click="editProject(project)"
                                            class="p-2 text-blue-600 transition-colors hover:text-blue-900 rounded-xl hover:bg-blue-50"
                                            title="Edit Project">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                </path>
                                            </svg>
                                        </button>
                                        <button @click="deleteProject(project.id)"
                                            class="p-2 text-red-600 transition-colors hover:text-red-900 rounded-xl hover:bg-red-50"
                                            title="Delete Project">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>

            <!-- Empty State -->
            <div x-show="filteredProjects.length === 0" class="py-12 text-center">
                <svg class="w-12 h-12 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 48 48">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 11H5a2 2 0 00-2 2v6a2 2 0 002 2h14m-5 10v-2.5a3.5 3.5 0 117 0V35a3 3 0 01-3 3H9a3 3 0 01-3-3v-6h2.5" />
                </svg>
                <h3 class="mt-4 text-sm font-medium text-gray-900">No projects found</h3>
                <p class="mt-2 text-sm text--500">primary 9tarted by creating a new project.</p>
            </div>

            <!-- Pagination -->
            <div class="flex items-center justify-between p-4">
                <div class="text-sm text-gray-600">
                    Page <span x-text="currentPage"></span> of <span x-text="totalPages"></span>
                </div>
                <div class="space-x-1">
                    <button @click="goToPage(currentPage - 1)" :disabled="currentPage === 1"
                        class="px-3 py-1 text-sm font-medium text-white bg-indigo-500 rounded hover:bg-indigo-600 disabled:opacity-50">
                        Prev
                    </button>
                    <template x-for="page in totalPages" :key="page">
                        <button @click="goToPage(page)"
                            :class="{
                                'bg-indigo-700 text-white': page === currentPage,
                                'bg-indigo-100 text-indigo-700 hover:bg-indigo-200': page !== currentPage
                            }"
                            class="px-3 py-1 text-sm font-medium rounded">
                            <span x-text="page"></span>
                        </button>
                    </template>
                    <button @click="goToPage(currentPage + 1)" :disabled="currentPage === totalPages"
                        class="px-3 py-1 text-sm font-medium text-white bg-indigo-500 rounded hover:bg-indigo-600 disabled:opacity-50">
                        Next
                    </button>
                </div>
            </div>
        </div>

        <!-- Add/Edit Project Modal -->
        <div x-show="showModal" class="fixed inset-0 z-50 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <!-- Overlay -->
                <div x-show="showModal" x-transition.opacity
                    class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" @click="closeModal"></div>

                <!-- Modal Content -->
                <div x-show="showModal" x-transition
                    class="inline-block px-4 pt-5 pb-4 overflow-hidden text-left align-bottom transition-all transform bg-white shadow-xl rounded-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-medium text-gray-900"
                            x-text="isEditMode ? 'Edit Project' : 'Add New Project'"></h3>
                        <button @click="closeModal" class="p-1 text-gray-400 hover:text-gray-600 rounded-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <form @submit.prevent="submitForm" class="space-y-4">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Project Name</label>
                            <input type="text" x-model="selectedProject.name"
                                class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-xl focus:ring-2 focus:outline-none focus:ring-blue-500 focus:border-transparent"
                                required>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Description</label>
                            <textarea x-model="selectedProject.description"
                                class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-xl focus:ring-2 focus:outline-none focus:ring-blue-500 focus:border-transparent"
                                rows="3"></textarea>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">Client</label>
                                <input type="text" x-model="selectedProject.client"
                                    class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-xl focus:ring-2 focus:outline-none focus:ring-blue-500 focus:border-transparent"
                                    required>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">Priority</label>
                                <select x-model="selectedProject.priority"
                                    class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-xl focus:ring-2 focus:outline-none focus:ring-blue-500 focus:border-transparent">
                                    <option value="Low">Low</option>
                                    <option value="Medium">Medium</option>
                                    <option value="High">High</option>
                                </select>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">Status</label>
                                <select x-model="selectedProject.status"
                                    class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-xl focus:ring-2 focus:outline-none focus:ring-blue-500 focus:border-transparent">
                                    <option value="Active">Active</option>
                                    <option value="On Hold">On Hold</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Cancelled">Cancelled</option>
                                </select>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">Progress (%)</label>
                                <input type="number" min="0" max="100"
                                    x-model.number="selectedProject.progress"
                                    class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-xl focus:ring-2 focus:outline-none focus:ring-blue-500 focus:border-transparent">
                            </div>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Deadline</label>
                            <input type="date" x-model="selectedProject.deadline"
                                class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-xl focus:ring-2 focus:outline-none focus:ring-blue-500 focus:border-transparent"
                                required>
                        </div>
                        <div class="flex justify-end pt-4 space-x-4">
                            <button type="button" @click="closeModal"
                                class="px-4 py-2.5 text-sm text-gray-700 transition-colors border border-gray-300 rounded-xl hover:bg-gray-50">
                                Cancel
                            </button>
                            <button type="submit"
                                class="px-4 py-2.5 text-white transition-colors bg-gradient-to-r from-blue-500 to-purple-500 rounded-xl hover:from-blue-600 hover:to-purple-600">
                                <span x-text="isEditMode ? 'Update Project' : 'Add Project'" class="text-sm"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-css')
    {{-- <script>
        function projectData() {
            return {
                showModal: false,
                isEditMode: false,
                searchQuery: '',
                selectedProject: {},
                projects: [{
                        id: 1,
                        name: 'Website Redesign',
                        description: 'New UI for company website',
                        status: 'Active',
                        progress: 60,
                        client: 'PT ABC',
                        priority: 'High',
                        deadline: '2025-01-01'
                    },
                    {
                        id: 2,
                        name: 'Mobile App',
                        description: 'iOS & Android application',
                        status: 'Completed',
                        progress: 100,
                        client: 'Startup XYZ',
                        priority: 'Medium',
                        deadline: '2024-12-31'
                    },
                    {
                        id: 3,
                        name: 'Inventory System',
                        description: 'Warehouse inventory tracking',
                        status: 'Active',
                        progress: 45,
                        client: 'PT Logistik Jaya',
                        priority: 'High',
                        deadline: '2025-06-15'
                    },
                    {
                        id: 4,
                        name: 'E-commerce Platform',
                        description: 'Online store with payment gateway',
                        status: 'In Review',
                        progress: 90,
                        client: 'Toko Online Nusantara',
                        priority: 'High',
                        deadline: '2025-04-20'
                    },
                    {
                        id: 5,
                        name: 'HR Management System',
                        description: 'Employee database and payroll',
                        status: 'Planning',
                        progress: 10,
                        client: 'PT Sumber Daya',
                        priority: 'Medium',
                        deadline: '2025-09-01'
                    },
                    {
                        id: 6,
                        name: 'Landing Page Campaign',
                        description: 'Promotional landing page for new product',
                        status: 'Completed',
                        progress: 100,
                        client: 'Startup GoDigital',
                        priority: 'Low',
                        deadline: '2025-02-01'
                    },
                    {
                        id: 7,
                        name: 'Customer Feedback App',
                        description: 'Mobile app for collecting feedback',
                        status: 'Active',
                        progress: 75,
                        client: 'Retail Solutions',
                        priority: 'Medium',
                        deadline: '2025-07-10'
                    },
                    {
                        id: 8,
                        name: 'Company Profile Website',
                        description: 'Static company website with CMS',
                        status: 'Completed',
                        progress: 100,
                        client: 'PT IndoProfil',
                        priority: 'Low',
                        deadline: '2024-11-20'
                    },
                    {
                        id: 9,
                        name: 'Booking System',
                        description: 'Online reservation system for services',
                        status: 'On Hold',
                        progress: 50,
                        client: 'Salon & Spa',
                        priority: 'Medium',
                        deadline: '2025-03-15'
                    },
                    {
                        id: 10,
                        name: 'Chatbot Integration',
                        description: 'AI chatbot for customer service',
                        status: 'Active',
                        progress: 40,
                        client: 'E-Service Center',
                        priority: 'High',
                        deadline: '2025-08-05'
                    },
                    {
                        id: 11,
                        name: 'POS System',
                        description: 'Point of Sale for retail',
                        status: 'Completed',
                        progress: 100,
                        client: 'Retail Mart',
                        priority: 'High',
                        deadline: '2025-01-30'
                    },
                    {
                        id: 12,
                        name: 'Internal Tools Dashboard',
                        description: 'Admin dashboard for company operations',
                        status: 'In Review',
                        progress: 85,
                        client: 'PT Global Internals',
                        priority: 'Medium',
                        deadline: '2025-05-25'
                    },
                    {
                        id: 13,
                        name: 'Learning Management System',
                        description: 'E-learning platform with modules',
                        status: 'Active',
                        progress: 55,
                        client: 'EduTech',
                        priority: 'High',
                        deadline: '2025-10-10'
                    },
                    {
                        id: 14,
                        name: 'Document Management',
                        description: 'System for managing internal documents',
                        status: 'Planning',
                        progress: 20,
                        client: 'PT Arsip Digital',
                        priority: 'Low',
                        deadline: '2025-12-01'
                    },
                    {
                        id: 15,
                        name: 'Social Media Automation',
                        description: 'Automated posting and analytics',
                        status: 'Active',
                        progress: 65,
                        client: 'Marketing Ninja',
                        priority: 'Medium',
                        deadline: '2025-07-01'
                    },
                    {
                        id: 16,
                        name: 'Online Survey Tool',
                        description: 'Custom survey creation and reporting',
                        status: 'Completed',
                        progress: 100,
                        client: 'PT Riset Mandiri',
                        priority: 'Low',
                        deadline: '2024-10-05'
                    },
                    {
                        id: 17,
                        name: 'Job Portal',
                        description: 'Platform for job listings and applications',
                        status: 'In Review',
                        progress: 70,
                        client: 'KaryaKarir',
                        priority: 'High',
                        deadline: '2025-09-20'
                    }
                ],
                currentPage: 1,
                pageSize: 10,
                watch: {
                    searchQuery(value) {
                        this.currentPage = 1;
                    }
                },
                get filteredProjects() {
                    if (!this.searchQuery) return this.projects;
                    const query = this.searchQuery.toLowerCase();
                    return this.projects.filter(p => p.name.toLowerCase().includes(query));
                },
                get paginatedProjects() {
                    const start = (this.currentPage - 1) * this.pageSize;
                    return this.filteredProjects.slice(start, start + this.pageSize);
                },
                get totalPages() {
                    return Math.ceil(this.projects.length / this.pageSize);
                },
                goToPage(page) {
                    if (page >= 1 && page <= this.totalPages) {
                        this.currentPage = page;
                    }
                },
                openModal() {
                    this.isEditMode = false;
                    this.selectedProject = {
                        name: '',
                        description: '',
                        status: 'Active',
                        progress: 0,
                        client: '',
                        priority: 'Medium',
                        deadline: ''
                    };
                    this.showModal = true;
                },
                editProject(project) {
                    this.isEditMode = true;
                    this.selectedProject = {
                        ...project
                    };
                    this.showModal = true;
                },
                deleteProject(id) {
                    if (confirm('Are you sure?')) {
                        this.projects = this.projects.filter(p => p.id !== id);
                    }
                },
                submitForm() {
                    if (this.isEditMode) {
                        // Update existing project
                        const index = this.projects.findIndex(p => p.id === this.selectedProject.id);
                        this.projects[index] = {
                            ...this.selectedProject
                        };
                    } else {
                        // Add new project
                        this.selectedProject.id = Date.now();
                        this.projects.push({
                            ...this.selectedProject
                        });
                    }
                    this.closeModal();
                },
                closeModal() {
                    this.showModal = false;
                }
            };
        }
    </script> --}}
@endpush
