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
    <h1 class="mb-6 text-2xl font-bold">Dashboard Overview</h1>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
        <div class="p-4 bg-white rounded shadow">
            <h2 class="text-lg font-semibold">Users</h2>
            <p class="text-3xl">1,234</p>
        </div>
        <div class="p-4 bg-white rounded shadow">
            <h2 class="text-lg font-semibold">Revenue</h2>
            <p class="text-3xl">$9,876</p>
        </div>
        <div class="p-4 bg-white rounded shadow">
            <h2 class="text-lg font-semibold">Projects</h2>
            <p class="text-3xl">45</p>
        </div>
    </div>

    <div class="p-6 mt-8 bg-white rounded shadow">
        <h2 class="mb-4 text-xl font-semibold">Recent Activity</h2>
        <ul class="space-y-2">
            <li>• User Jane logged in</li>
            <li>• New project created: "Project Alpha"</li>
            <li>• Report generated on Jan 10, 2025</li>
        </ul>
    </div>
@endsection

@push('js')
@endpush
