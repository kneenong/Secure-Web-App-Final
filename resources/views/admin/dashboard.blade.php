<meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />

<x-dashboard-layout>
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Welcome, {{ auth()->user()->name }}!</h1>

    <p class="text-gray-700 mb-8">Admin Dashboard: system stats and recent activity.</p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Total Users -->
        <div class="bg-white rounded-xl shadow-md p-6 text-center">
            <h2 class="text-xl font-semibold text-gray-900 mb-2">Total Users</h2>
            <p class="text-gray-600 text-2xl">{{ \App\Models\User::count() }}</p>
        </div>

        <!-- Last Registered User -->
        <div class="bg-white rounded-xl shadow-md p-6 text-center">
            <h2 class="text-xl font-semibold text-gray-900 mb-2">Last Registered User</h2>
            @php $lastUser = \App\Models\User::latest()->first(); @endphp
            <p class="text-gray-600">{{ $lastUser ? $lastUser->name : 'None' }}</p>
        </div>

        <!-- Admin Login Attempts -->
        <div class="bg-white rounded-xl shadow-md p-6 text-center">
            <h2 class="text-xl font-semibold text-gray-900 mb-2">Admin Logins</h2>
            @php 
                $admins = \Spatie\Permission\Models\Role::findByName('admin')->users ?? collect();
            @endphp
            <p class="text-gray-600">{{ $admins->count() }} total admins</p>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <a href="{{ route('admin.users.index') }}" class="block bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition">
            <h2 class="text-xl font-semibold text-gray-900 mb-2">Manage Users</h2>
            <p class="text-gray-600">View, update roles, or remove users.</p>
        </a>

        <a href="#" class="block bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition">
            <h2 class="text-xl font-semibold text-gray-900 mb-2">Settings</h2>
            <p class="text-gray-600">Configure application settings.</p>
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
