<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="content-language" content="{{ str_replace('_', '-', app()->getLocale()) }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex, nofollow">
        <meta name="description" content="A web-based application for managing military vehicles at a battalion's parking lot.">

        <!-- Title -->
        <title>{{ config('app.name', 'Military Parking Lot Manager') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Favicon -->
        <link rel="icon" href="{{ asset('favicon.ico') }}">
        
        <!-- Styles / Scripts -->
        @if (app()->isProduction() && file_exists(public_path('build/manifest.json')))
            <link href="{{ asset("build/assets/$cssBuildFilePath") }}" rel="stylesheet">
            <script src="{{ asset("build/assets/$jsBuildFilePath") }}"></script>
        @else
            @vite(['resources/css/app.css','resources/js/app.js'])
        @endif

        @livewireStyles
    </head>
    <body>
        <!-- Main content -->
        <main>
            @yield('content')
        </main>
        
        @livewireScripts
    </body>
</html>