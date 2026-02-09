<x-guest-layout>
    <h2 class="text-2xl font-bold text-gray-900 text-center mb-6">Register</h2>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <div>
            <label class="block text-gray-700 font-medium">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" required
                   class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-black focus:border-black">
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Email -->
        <div>
            <label class="block text-gray-700 font-medium">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required
                   class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-black focus:border-black">
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

       <!-- Password -->
<div>
    <label class="block text-gray-700 font-medium">Password</label>
    <input type="password" id="password" name="password" required
           class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-black focus:border-black">

    @error('password')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror

    <!-- Strength meter -->
    <div id="password-strength" class="mt-2 text-sm font-medium"></div>
</div>

<!-- Confirm Password -->
<div>
    <label class="block text-gray-700 font-medium">Confirm Password</label>
    <input type="password" name="password_confirmation" required
           class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-black focus:border-black">
</div>
        <!-- Submit button -->
        <button type="submit"
                class="w-full py-2 bg-black text-white rounded-lg font-semibold hover:bg-white hover:text-black hover:border hover:border-black transition transform hover:-translate-y-1 shadow-md">
            Register
        </button>

        <p class="mt-4 text-center text-gray-600 text-sm">
            Already have an account? 
            <a href="{{ route('login') }}" class="text-black font-semibold hover:underline">Login</a>
        </p>
    </form>
</x-guest-layout>
<!-- Password Strength Meter Script -->
<script>
const passwordInput = document.getElementById('password');
const strengthText = document.getElementById('password-strength');

passwordInput.addEventListener('input', () => {
    const value = passwordInput.value;

    if (value.length < 6) {
        strengthText.textContent = 'Weak';
        strengthText.className = 'mt-2 text-red-500 font-medium';
    } else if (value.length < 10) {
        strengthText.textContent = 'Medium';
        strengthText.className = 'mt-2 text-yellow-500 font-medium';
    } else {
        strengthText.textContent = 'Strong';
        strengthText.className = 'mt-2 text-green-500 font-medium';
    }
});
</script>
