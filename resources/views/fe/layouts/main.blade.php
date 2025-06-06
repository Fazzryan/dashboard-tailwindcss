<!DOCTYPE html>
<html lang="en">

<head>
    @livewireStyles
    @include('fe.layouts.head')
</head>

<body class="text-gray-900 bg-gray-100">

    @include('fe.layouts.navbar')

    <div class="container p-4 mx-auto">
        @yield('content')
    </div>

    @livewireScripts
</body>

</html>
