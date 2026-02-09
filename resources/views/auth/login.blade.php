<x-guest-layout>
    <h2 class="text-2xl font-bold text-gray-900 text-center mb-6">Login</h2>

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Email -->
        <div>
            <label class="block text-gray-700 font-medium">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus
                   class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-black focus:border-black">
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <label class="block text-gray-700 font-medium">Password</label>
            <input type="password" name="password" required
                   class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-black focus:border-black">
            @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Remember me -->
        <div class="flex items-center justify-between">
            <label class="flex items-center text-gray-700 font-medium">
                <input type="checkbox" name="remember" class="mr-2"> Remember me
            </label>
            <a href="#" class="text-black font-semibold hover:underline text-sm">Forgot password?</a>
        </div>

        <!-- Submit button -->
        <button type="submit"
                class="w-full py-2 bg-black text-white rounded-lg font-semibold hover:bg-white hover:text-black hover:border hover:border-black transition transform hover:-translate-y-1 shadow-md">
            Login
        </button>

        <p class="mt-4 text-center text-gray-600 text-sm">
            Don't have an account? 
            <a href="{{ route('register') }}" class="text-black font-semibold hover:underline">Register</a>
        </p>
    </form>
</x-guest-layout>
