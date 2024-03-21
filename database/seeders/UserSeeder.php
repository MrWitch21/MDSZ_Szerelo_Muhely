<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Receptionist user
        User::create([
            'name' => 'Jani',
            'email' => 'receptionist@example.com',
            'password' => bcrypt('password'),
            'username' => 'rec',
            'role' => 'receptionist',
        ]);

        // Mechanic user
        User::create([
            'name' => 'Pista',
            'email' => 'mechanic@example.com',
            'password' => bcrypt('password'),
            'username' => 'mech',
            'role' => 'mechanic',
        ]);

        // Admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'username' => 'admin',
            'role' => 'admin',
        ]);

    }
}