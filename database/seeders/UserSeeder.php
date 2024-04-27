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
            'name' => 'Jani1',
            'email' => 'receptionist1@example.com',
            'password' => bcrypt('password'),
            'usercode' => 'ABC122',
            'role' => 'receptionist',
        ]);
        User::create([
            'name' => 'Jani2',
            'email' => 'receptionist2@example.com',
            'password' => bcrypt('password'),
            'usercode' => 'ABC123',
            'role' => 'receptionist',
        ]);

        // Mechanic user
        User::create([
            'name' => 'Pista1',
            'email' => 'mechanic1@example.com',
            'password' => bcrypt('password'),
            'usercode' => 'ABC124',
            'role' => 'mechanic',
        ]);
        User::create([
            'name' => 'Pista2',
            'email' => 'mechanic2@example.com',
            'password' => bcrypt('password'),
            'usercode' => 'ABC125',
            'role' => 'mechanic',
        ]);
    }
}
