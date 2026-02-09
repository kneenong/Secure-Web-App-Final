<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Secure Web App') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f5f5f5; }
    </style>

    <!-- Prevent back button caching -->
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
</head>
<body class="min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-white shadow-md py-4">
        <div class="container mx-auto flex items-center justify-between px-6">
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Secure Web App Logo" class="w-16 h-16 object-contain">
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-black text-white px-4 py-2 rounded-lg font-semibold hover:bg-white hover:text-black hover:border hover:border-black transition">
                    Logout
                </button>
            </form>
        </div>
    </header>

    <!-- Main content -->
    <main class="flex-1 container mx-auto px-6 py-8">
        {{ $slot }}
    </main>

    <footer class="bg-white shadow-md py-4 mt-auto text-center text-gray-500 text-sm">
        &copy; {{ date('Y') }} Secure Web App. All rights reserved.
    </footer>

    <!-- Auto logout on back button -->
    <script>
    window.addEventListener('pageshow', function(event) {
        if (event.persisted || (window.performance && window.performance.getEntriesByType('navigation')[0].type === 'back_forward')) {
            document.getElementById('logout-form').submit();
        }
    });
    </script>

</body>
</html>
