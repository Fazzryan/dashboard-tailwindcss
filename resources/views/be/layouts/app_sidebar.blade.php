<!-- resources/views/components/sidebar.blade.php -->
<aside x-data="{ open: true }"
    class="fixed inset-y-0 left-0 z-30 w-64 transition-transform duration-300 ease-in-out transform bg-white shadow-lg"
    :class="{ '-translate-x-full': !open, 'translate-x-0': open }"
    x-show.transition.opacity.duration.300ms="open || window.innerWidth >= 768">

    <!-- Overlay for mobile -->
    <div x-show="open && window.innerWidth < 768" @click.away="open = false"
        class="fixed inset-0 z-10 bg-black bg-opacity-50 md:hidden"></div>

    <div class="flex flex-col h-full">
        <!-- Logo -->
        <div class="flex items-center justify-center h-16 border-b">
            <span class="text-xl font-bold text-indigo-600">Dashboard</span>
        </div>

        <!-- Menu -->
        <nav class="flex-1 p-4 space-y-2">
            <a href="#" class="block px-4 py-2 text-gray-700 rounded hover:bg-indigo-100">🏠 Dashboard</a>
            <a href="#" class="block px-4 py-2 text-gray-700 rounded hover:bg-indigo-100">📁 Projects</a>
            <a href="#" class="block px-4 py-2 text-gray-700 rounded hover:bg-indigo-100">📊 Reports</a>
            <a href="#" class="block px-4 py-2 text-gray-700 rounded hover:bg-indigo-100">⚙️ Settings</a>
        </nav>
    </div>
</aside>
