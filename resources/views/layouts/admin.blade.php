<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Panel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
 <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
    <!-- Styles / Scripts -->
    <x-style />
    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-900 min-h-screen flex flex-col">

    <!-- Navbar -->
    <x-navbar />
    <div class="flex min-h-screen">
        <div class="flex flex-1">
            <!-- Sidebar -->
            <x-sidebar />

            <!-- Main Content -->
            <main class="flex-1 p-6">
                @yield('content')
            </main>

            <!-- Modal Livewire Global -->
            <livewire:job-create />
        </div>
    </div>
    @livewireScripts
</body>
</html>
