<nav x-data="{ isOpen: false, isUserMenuOpen: false }" class="text-white shadow-lg bg-gradient-to-r from-indigo-600 to-purple-600">
    <div class="container px-4 mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo / Brand -->
            <div class="flex items-center">
                <a href="#" class="flex items-center space-x-2 text-xl font-bold">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                    </svg>
                    <span>MyApp</span>
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                <a href="#"
                    class="px-3 py-2 text-sm font-medium transition rounded-md md:text-base hover:text-blue-500">Home</a>
                <a href="#"
                    class="px-3 py-2 text-sm font-medium transition rounded-md md:text-base hover:text-blue-500">Features</a>
                <a href="#"
                    class="px-3 py-2 text-sm font-medium transition rounded-md md:text-base hover:text-blue-500">Pricing</a>
                <a href="#"
                    class="px-3 py-2 text-sm font-medium transition rounded-md md:text-base hover:text-blue-500">Blog</a>

                <!-- User Dropdown -->
                <div x-data="{ open: false }" class="relative ml-3">
                    <button @click="open = !open" class="flex items-center text-sm md:text-base focus:outline-none">
                        <span class="ml-2">Jane Doe</span>
                        <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>

                    <!-- Dropdown dengan transisi -->
                    <div x-show="open" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-100"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                        @click.away="open = false"
                        class="absolute right-0 z-10 w-48 py-1 mt-2 text-gray-700 bg-white rounded-md shadow-lg">
                        <a href="#" class="block px-4 py-2 text-sm md:text-base hover:bg-gray-100">Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm md:text-base hover:bg-gray-100">Settings</a>
                        <a href="#" class="block px-4 py-2 text-sm md:text-base hover:bg-gray-100">Logout</a>
                    </div>
                </div>

                <!-- CTA Button -->
                <a href="#"
                    class="px-4 py-2 ml-4 text-sm font-medium text-indigo-600 transition bg-white rounded-md hover:bg-gray-100">
                    Get Started
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="flex items-center -mr-2 sm:hidden">
                <button @click="isOpen = !isOpen"
                    class="inline-flex items-center justify-center p-2 text-white rounded-md hover:text-white hover:text-blue-500 focus:outline-none">
                    <svg x-show="!isOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg x-show="isOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="isOpen" x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="-translate-y-2 opacity-0" x-transition:enter-end="translate-y-0 opacity-100"
        x-transition:leave="transition ease-in duration-200 transform"
        x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="-translate-y-2 opacity-0"
        class="pb-3 overflow-hidden bg-indigo-700 rounded-b-lg sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <a href="#"
                class="block py-2 pl-4 pr-4 text-base font-medium rounded-md hover:text-indigo-600">Home</a>
            <a href="#"
                class="block py-2 pl-4 pr-4 text-base font-medium rounded-md hover:text-indigo-600">Features</a>
            <a href="#"
                class="block py-2 pl-4 pr-4 text-base font-medium rounded-md hover:text-indigo-600">Pricing</a>
            <a href="#"
                class="block py-2 pl-4 pr-4 text-base font-medium rounded-md hover:text-indigo-600">Blog</a>
        </div>

        <!-- Mobile User Menu -->
        <div class="pt-4 pb-3 border-t border-indigo-600">
            <div class="px-4 mt-3 space-y-1">
                <a href="#" class="block py-2 text-base font-medium text-white hover:text-gray-200">Profile</a>
                <a href="#" class="block py-2 text-base font-medium text-white hover:text-gray-200">Settings</a>
                <a href="#" class="block py-2 text-base font-medium text-white hover:text-gray-200">Logout</a>
            </div>

            <div class="px-4 mt-4">
                <a href="#"
                    class="block w-full px-4 py-2 font-medium text-center text-indigo-600 bg-white rounded-md hover:bg-gray-100">
                    Get Started
                </a>
            </div>
        </div>
    </div>
</nav>
