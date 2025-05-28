<!-- resources/views/components/navbar.blade.php -->
<nav class="bg-white shadow">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex items-center shrink-0">
                    <span class="text-xl font-bold text-gray-800">MyApp</span>
                </div>
            </div>

            <!-- Desktop Menu -->
            <div class="hiadden sm:ml-6 sm:flex sm:items-center">
                <a href="#"
                    class="px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:text-indigo-600">Home</a>
                <a href="#"
                    class="px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:text-indigo-600">About</a>

                <!-- Dropdown -->
                <div x-data="{ open: false }" class="relative ml-3">
                    <button @click="open = !open" class="flex items-center text-sm focus:outline-none">
                        <span class="mr-1 text-gray-700">User</span>
                        <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>

                    <div x-show="open" x-transition @click.away="open = false"
                        class="absolute right-0 z-10 w-48 py-1 mt-2 bg-white rounded-md shadow-lg">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
