<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Job Portal</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
        <!-- Styles / Scripts -->
        <x-style />
        @livewireStyles
    </head>
    <body class="bg-white text-gray-900 min-h-screen flex flex-col">
        <!-- Navigation -->
        <x-navbar />

        <!-- Main Content -->
        <main class="flex-1">
            @yield('content')
        </main>

        <!-- Footer -->
        <x-footer />

        <!-- Modal Livewire Global -->
        <livewire:job-create />

        @livewireScripts
    </body>
</html>
