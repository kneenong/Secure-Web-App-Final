<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Secure Web App') }}</title>

    <!-- Modern font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-gradient-to-b from-gray-100 via-white to-gray-200 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md px-6 py-8">

        <!-- Logo -->
        <div class="mb-8 text-center">
            <a href="/">
                <x-application-logo />
            </a>
        </div>

        <!-- Card -->
        <div class="bg-white shadow-md rounded-xl overflow-hidden p-6">
            {{ $slot }}
        </div>

        <!-- Footer -->
        <div class="mt-6 text-gray-500 text-sm text-center">
            &copy; {{ date('Y') }} Secure Web App. All rights reserved.
        </div>
    </div>

</body>
</html>
