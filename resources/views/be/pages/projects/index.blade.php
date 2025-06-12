@extends('be.layouts.app_main')

@push('meta-seo')
    <meta name="description" content="Projects overview with key metrics and recent activity.">
    <meta name="keywords" content="Projects, metrics, activity">
    <meta name="author" content="Your Name">
    <title>Projects - Admin Panel</title>
@endpush

@section('content')
    <!-- Header -->
    <div class="mb-8 sm:flex sm:justify-between sm:items-center">
        <!-- 📁 Page Title -->
        <div>
            <h1 class="mb-2 text-2xl font-semibold text-primary-900">Projects</h1>
            <p class="text-primary-900">Manage and track your projects efficiently.</p>
        </div>
        <!-- Breadcrumb -->
        <nav class="mb-1 text-base text-gray-500" aria-label="Breadcrumb">
            <ol class="inline-flex p-0 list-none">
                <li class="flex items-center">
                    <a href="#" class="text-gray-400 hover:text-gray-600">Dashboard</a>
                    <svg class="w-4 h-4 mx-2 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M6 6L14 10L6 14V6Z" />
                    </svg>
                </li>
                <li class="font-medium text-primary-700">Projects</li>
            </ol>
        </nav>
    </div>

    <livewire:be.projects.project-table />
@endsection
