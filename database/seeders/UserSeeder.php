<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@mycookies.com',
            'password' => Hash::make('password'),
            'role_id' => 1,
        ]);

        // Create regular user
        User::create([
            'name' => 'User',
            'email' => 'user@mycookies.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
    }
}