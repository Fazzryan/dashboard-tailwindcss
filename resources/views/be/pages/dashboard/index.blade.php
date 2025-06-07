@extends('be.layouts.app_main')

@push('meta-seo')
    <meta name="description" content="Dashboard overview with key metrics and recent activity.">
    <meta name="keywords" content="dashboard, metrics, activity">
    <meta name="author" content="Your Name">
    <title>Dashboard - Admin Panel</title>
@endpush

@push('custom-css')
@endpush

@section('content')
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 gap-6 mb-8 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Card 1 -->
        <div
            class="p-6 transition-shadow duration-200 bg-white border shadow-sm rounded-2xl border-primary-300 hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Projects</p>
                    <p class="mt-2 text-3xl font-bold text-gray-900">24</p>
                    <p class="mt-2 text-sm text-green-600">↗ +12% from last month</p>
                </div>
                <div class="flex items-center justify-center w-12 h-12 bg-blue-100 rounded-2xl">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                        </path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div
            class="p-6 transition-shadow duration-200 bg-white border border-purple-300 shadow-sm rounded-2xl hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Active Users</p>
                    <p class="mt-2 text-3xl font-bold text-gray-900">1,284</p>
                    <p class="mt-2 text-sm text-green-600">↗ +8% from last month</p>
                </div>
                <div class="flex items-center justify-center w-12 h-12 bg-purple-100 rounded-2xl">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 text-purple-600">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div
            class="p-6 transition-shadow duration-200 bg-white border border-green-300 shadow-sm rounded-2xl hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Revenue</p>
                    <p class="mt-2 text-3xl font-bold text-gray-900">$48,392</p>
                    <p class="mt-2 text-sm text-red-600">↘ -3% from last month</p>
                </div>
                <div class="flex items-center justify-center w-12 h-12 bg-green-100 rounded-2xl">
                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        class="w-6 h-6 text-green-600">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>

                </div>
            </div>
        </div>

        <!-- Card 4 -->
        <div
            class="p-6 transition-shadow duration-200 bg-white border border-orange-300 shadow-sm rounded-2xl hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Conversion Rate</p>
                    <p class="mt-2 text-3xl font-bold text-gray-900">3.24%</p>
                    <p class="mt-2 text-sm text-green-600">↗ +0.5% from last month</p>
                </div>
                <div class="flex items-center justify-center w-12 h-12 bg-orange-100 rounded-2xl">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Section -->
    <div class="grid grid-cols-1 gap-6 mb-8 lg:grid-cols-2">
        <!-- Chart 1 -->
        <div class="p-6 bg-white border border-gray-100 shadow-sm rounded-2xl">
            <h3 class="mb-4 text-lg font-semibold text-gray-900">Revenue Overview</h3>
            <div class="flex items-center justify-center h-64 bg-gradient-to-br from-blue-50 to-purple-50 rounded-2xl">
                <p class="text-gray-500">Chart Placeholder</p>
            </div>
        </div>

        <!-- Chart 2 -->
        <div class="p-6 bg-white border border-gray-100 shadow-sm rounded-2xl">
            <h3 class="mb-4 text-lg font-semibold text-gray-900">User Activity</h3>
            <div class="flex items-center justify-center h-64 bg-gradient-to-br from-green-50 to-blue-50 rounded-2xl">
                <p class="text-gray-500">Chart Placeholder</p>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="bg-white border border-gray-100 shadow-sm rounded-2xl">
        <div class="p-6 border-b border-gray-100">
            <h3 class="text-lg font-semibold text-gray-900">Recent Activity</h3>
        </div>
        <div class="p-6">
            <div class="space-y-4">
                <div class="flex items-center space-x-4">
                    <div class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-2xl">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-900">New project created</p>
                        <p class="text-sm text-gray-500">Design System v2.0 project has been created</p>
                    </div>
                    <span class="text-sm text-gray-500">2 hours ago</span>
                </div>

                <div class="flex items-center space-x-4">
                    <div class="flex items-center justify-center w-10 h-10 bg-green-100 rounded-2xl">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-900">Task completed</p>
                        <p class="text-sm text-gray-500">Homepage redesign has been completed</p>
                    </div>
                    <span class="text-sm text-gray-500">4 hours ago</span>
                </div>

                <div class="flex items-center space-x-4">
                    <div class="flex items-center justify-center w-10 h-10 bg-purple-100 rounded-2xl">
                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-900">New team member</p>
                        <p class="text-sm text-gray-500">Sarah Johnson joined the design team</p>
                    </div>
                    <span class="text-sm text-gray-500">1 day ago</span>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
