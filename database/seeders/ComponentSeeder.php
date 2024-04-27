<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Component;
use App\Models\Worksheet;
use App\Models\User;
class ComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $components = Component::factory(5)->create();

        Worksheet::factory(3)->create()->each(function ($worksheet) {
            $components = Component::inRandomOrder()->take(rand(1, 3))->get();
            foreach ($components as $component) {
                $worksheet->components()->attach($component, [
                    'quantity' => rand(1, 5)
                ]);
            }
            // A recepciós hozzárendelése
            $receptionist = User::where('role', 'receptionist')->inRandomOrder()->first();
            $worksheet->users()->attach($receptionist, ['access_role' => 'receptionist']);

            // A mechanikus hozzárendelése
            $mechanic = User::where('role', 'mechanic')->inRandomOrder()->first();
            $worksheet->users()->attach($mechanic, ['access_role' => 'mechanic']);
        });
    }
}
