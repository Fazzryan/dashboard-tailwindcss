<!-- resources/views/components/navbar.blade.php -->
<header x-data="{ sidebarOpen: false }" class="fixed top-0 left-0 right-0 z-20 bg-white shadow-md">
    <div class="flex items-center justify-between px-4 py-3 md:px-6">
        <div class="flex items-center">
            <button @click="sidebarOpen = true" class="text-gray-500 md:hidden focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <a href="#" class="ml-2 text-xl font-bold text-indigo-600">MyApp</a>
        </div>

        <div class="items-center hidden space-x-4 md:flex">
            <span class="text-sm">Welcome, Jane Doe</span>
            <img src="https://i.pravatar.cc/150?img=58 " alt="User Avatar" class="w-8 h-8 rounded-full">
        </div>
    </div>
</header>
