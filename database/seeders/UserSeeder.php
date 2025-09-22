<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Super Master',
            'email' => 'master@apotek.com',
            'password' => Hash::make('password'),
            'role' => 'master',
        ]);

        User::create([
            'name' => 'Admin Apotek',
            'email' => 'admin@apotek.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Kasir Satu',
            'email' => 'kasir@apotek.com',
            'password' => Hash::make('password'),
            'role' => 'kasir',
        ]);
    }
}
