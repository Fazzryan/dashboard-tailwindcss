<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

@stack('meta-seo')

@vite(['resources/css/app.css', 'resources/js/app.js'])

<link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

@stack('custom-css')
