<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-g">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Tenant Dashboard') - JohnKos</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Theme Persistance Script -->
    <script>
        (function() {
            const theme = localStorage.getItem('color-theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
            if (theme === 'dark') {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        })();
    </script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-background dark:bg-dark-background text-main dark:text-dark-main transition-colors duration-300">
    <div class="flex min-h-screen animate-fade-in">
        @include('layouts.tenant.sidebar')

        <main class="flex-1 p-6">
            @include('layouts.tenant.header')

            <div class="mt-6">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
