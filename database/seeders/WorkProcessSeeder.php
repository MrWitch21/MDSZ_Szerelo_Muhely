<?php

namespace Database\Seeders;

use App\Models\WorkProcess;
use App\Models\Worksheet;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkProcessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $workProcesses = WorkProcess::factory(5)->create();

        // Munkafolyamatok létrehozása és hozzárendelése a munkalapokhoz
        Worksheet::factory(3)->create()->each(function ($worksheet) {
            $workProcesses = WorkProcess::inRandomOrder()->take(rand(1, 3))->get();
            foreach ($workProcesses as $workProcess) {
                $worksheet->workProcesses()->attach($workProcess, [
                    'duration' => rand(1, 480)
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
