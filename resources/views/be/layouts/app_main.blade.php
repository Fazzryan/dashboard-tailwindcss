<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    @include('be.layouts.app_head')
</head>

<body class="h-screen bg-gray-100">

    <!-- Navbar -->
    @include('be.layouts.app_navbar')

    <div class="flex">
        <!-- Sidebar -->
        @include('be.layouts.app_sidebar')

        <!-- Main Content -->
        <div class="flex-1 p-6 overflow-y-auto md:p-10">
            @yield('content')
        </div>
    </div>

    @include('be.layouts.app_footer')

    @include('be.layouts.app_script')
</body>

</html>
