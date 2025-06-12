<header class="bg-white border-b border-gray-100 shadow-sm">
    <div class="flex items-center justify-between h-16 px-4 sm:px-6 lg:px-8">
        <!-- Left side -->
        <div class="flex items-center">
            <!-- Mobile menu button -->
            <button @click="sidebarOpen = true"
                class="p-2 text-gray-400 rounded-md lg:hidden hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>

            <!-- Page title -->
            {{-- <h1 class="ml-4 text-xl font-semibold text-gray-900 lg:ml-0">Dashboard Overview</h1> --}}
        </div>

        <!-- Right side -->
        <div class="flex items-center space-x-4">
            <!-- Search -->
            <div class="relative hidden sm:block">
                <input type="text" placeholder="Search..."
                    class="w-64 py-2 pl-10 pr-4 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-400 focus:border-transparent bg-gray-50">
                <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>

            <!-- Notifications -->
            <button class="relative p-2 text-gray-400 rounded-lg hover:text-gray-500 hover:bg-gray-100">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 7a3 3 0 016 0v4a3 3 0 01-3 3h-3a3 3 0 01-3-3V7z"></path>
                </svg>
                <span class="absolute w-2 h-2 bg-red-500 rounded-full top-1 right-1"></span>
            </button>

            <!-- Profile dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                    class="flex items-center p-2 space-x-2 text-sm rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-primary-400">
                    <div
                        class="flex items-center justify-center w-8 h-8 rounded-lg bg-gradient-to-r from-primary-500 to-primary-300">
                        <span class="text-xs font-medium text-white">JD</span>
                    </div>
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div x-show="open" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95" @click.away="open = false"
                    class="absolute right-0 z-50 w-48 mt-2 bg-white border border-gray-100 rounded-lg shadow-lg">
                    <div class="py-2">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Settings</a>
                        <hr class="my-1">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Sign out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
