@extends('fe.layouts.main')

@push('meta-seo')
    <meta name="description"
        content="Selamat datang di website kami. Temukan berbagai informasi dan layanan yang kami tawarkan.">
    <meta name="keywords" content="website, layanan, informasi">
    <meta name="author" content="Nama Anda">
    <title>Beranda - Website Kami</title>
@endpush

@push('custom-css')
@endpush

@section('content')
    <div class="text-center lg:pt-16">
        <h1 class="mb-4 text-4xl font-bold">Selamat Datang di Website Kami</h1>
        <p class="mb-8 text-lg">Temukan berbagai informasi dan layanan yang kami tawarkan.</p>
        <a href="" class="px-6 py-3 text-white transition bg-blue-500 rounded hover:bg-blue-600">
            Hubungi Kami
        </a>
    </div>
@endsection

@push('js')
@endpush
