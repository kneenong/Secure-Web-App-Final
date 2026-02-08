<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class RolesAndUsersSeeder extends Seeder
{
    public function run()
    {
        // create roles
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'user']);

        // create admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('Admin@12345')
            ]
        );
        $admin->assignRole('admin');

        // create normal user
        $user = User::firstOrCreate(
            ['email'=>'user@example.com'],
            [
                'name' => 'Normal User',
                'password' => Hash::make('User@12345')
            ]
        );
        $user->assignRole('user');
    }
}
