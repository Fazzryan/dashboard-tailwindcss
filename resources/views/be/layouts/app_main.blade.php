<!DOCTYPE html>
<html lang="id" x-data="dashboardData()">

<head>
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('be.layouts.app_head')
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50">
    <!-- Main Container -->
    <div class="flex h-screen overflow-hidden">

        <!-- Mobile sidebar backdrop -->
        <div x-show="sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 z-30 bg-gray-600 bg-opacity-75 lg:hidden"
            @click="sidebarOpen = false">
        </div>

        <!-- Sidebar -->
        @include('be.layouts.app_sidebar')

        <!-- Main Content Area -->
        <div class="flex flex-col flex-1 overflow-hidden">

            <!-- Navbar Component -->
            @include('be.layouts.app_navbar')

            <!-- Content Component -->
            <main class="flex-1 p-4 overflow-auto sm:p-6 lg:p-8">
                @yield('content')
            </main>

            <!-- Footer Component -->
            @include('be.layouts.app_footer')
        </div>
    </div>
    @include('be.layouts.app_script')
    @livewireScripts

</body>

</html>
