<meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />

<x-dashboard-layout>
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Welcome, {{ auth()->user()->name }}!</h1>

    <p class="text-gray-700 mb-8">User Dashboard: quick stats and actions.</p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <!-- Profile Info -->
        <div class="bg-white rounded-xl shadow-md p-6 text-center">
            <h2 class="text-xl font-semibold text-gray-900 mb-2">My Profile</h2>
            <p class="text-gray-600">Email: {{ auth()->user()->email }}</p>
        </div>

        <!-- Last Login -->
        <div class="bg-white rounded-xl shadow-md p-6 text-center">
            <h2 class="text-xl font-semibold text-gray-900 mb-2">Last Login</h2>
            <p class="text-gray-600">{{ auth()->user()->last_login_at ?? 'First login' }}</p>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <a href="{{ route('profile.edit') }}" class="block bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition">
            <h2 class="text-xl font-semibold text-gray-900 mb-2">Edit Profile</h2>
            <p class="text-gray-600">Update your information and password.</p>
        </a>

        <a href="#" class="block bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition">
            <h2 class="text-xl font-semibold text-gray-900 mb-2">Activities</h2>
            <p class="text-gray-600">Check recent actions and notifications.</p>
        </a>
    </div>
</x-dashboard-layout>
<script>
window.addEventListener('pageshow', function(event) {
    if (event.persisted || (window.performance && window.performance.getEntriesByType('navigation')[0].type === 'back_forward')) {
        // Redirect to logout if coming from back button
        document.getElementById('logout-form').submit();
    }
});
</script>
<script>
window.addEventListener('pageshow', function(event) {
    if (event.persisted || (window.performance && window.performance.getEntriesByType('navigation')[0].type === 'back_forward')) {
        // Redirect to GET auto-logout route instead of submitting POST form
        window.location.href = "{{ route('auto.logout') }}";
    }
});
</script>
