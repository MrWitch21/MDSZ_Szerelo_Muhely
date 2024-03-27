<?php

namespace Database\Seeders;

use App\Models\WorkProcess;
use App\Models\Worksheet;
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

        // Munkalapok létrehozása és hozzárendelése a munkafolyamatokhoz
        Worksheet::factory(10)->create()->each(function ($worksheet) use ($workProcesses) {
            $worksheet->workProcesses()->attach(
                $workProcesses->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
