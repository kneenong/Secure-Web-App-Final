<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\User\DashboardController as UserDashboard;
use App\Http\Controllers\Admin\UserController;

Route::get('/', fn() => view('welcome'));

// User dashboard routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserDashboard::class, 'index'])->name('dashboard');

    // Profile CRUD routes
    Route::get('/profile', function() {
        $user = auth()->user();
        return view('profile.edit', compact('user'));
    })->name('profile.edit');

    Route::patch('/profile', function(Request $request) {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('profile.edit')->with('success','Profile updated successfully!');
    })->name('profile.update');

    Route::delete('/profile', function(Request $request) {
        $user = auth()->user();

        $request->validate([
            'password' => 'required',
        ]);

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password does not match.']);
        }

        Auth::logout();

        $user->delete();

        return redirect('/')->with('success', 'Account deleted successfully.');
    })->name('profile.destroy');
});

// Admin routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::put('/users/{user}', [UserController::class, 'updateRole'])->name('users.update');
});
     Route::get('/auto-logout', function() {
    auth()->logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/login');
})->name('auto.logout');
require __DIR__.'/auth.php';
