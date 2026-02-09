<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Web App</title>

    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')

    <!-- Google Font: Poppins for Modern Look -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-b from-gray-100 via-white to-gray-200 min-h-screen flex items-center justify-center">

    <div class="flex flex-col items-center px-4">

        <!-- Logo -->
        <div class="mb-12">
            <img src="{{ asset('images/logo.png') }}" alt="Secure Web App Logo" class="w-60 h-60 object-contain mx-auto">
        </div>

        <!-- Title -->
        <h1 class="text-5xl font-bold text-gray-900 mb-4 text-center">Secure Web App</h1>
        <p class="text-gray-600 text-center mb-12 text-lg">
            Login or Register to access your dashboard
        </p>

        <!-- Action Buttons -->
        <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-6">

            <!-- Login Button -->
            <a href="{{ route('login') }}"
               class="px-16 py-3 bg-black text-white font-semibold rounded-lg shadow-md hover:bg-white hover:text-black hover:border hover:border-black transition transform hover:-translate-y-1 hover:shadow-lg text-center">
                Login
            </a>

            <!-- Register Button -->
            <a href="{{ route('register') }}"
               class="px-16 py-3 bg-white text-black font-semibold rounded-lg shadow-md hover:bg-black hover:text-white hover:border hover:border-white transition transform hover:-translate-y-1 hover:shadow-lg text-center">
                Register
            </a>

        </div>

        <!-- Footer -->
        <div class="mt-20 text-gray-500 text-sm text-center">
            &copy; {{ date('Y') }} Secure Web App. All rights reserved.
        </div>

    </div>

</body>
</html>
