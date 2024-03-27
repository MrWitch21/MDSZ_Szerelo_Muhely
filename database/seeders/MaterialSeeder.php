<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Worksheet;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $materials = Material::factory(5)->create();

        Worksheet::factory(3)->create()->each(function ($worksheet) {
            $materials = Material::inRandomOrder()->take(rand(1, 3))->get();
            foreach ($materials as $material) {
                $worksheet->materials()->attach($material, [
                    'quantity' => rand(1, 5)
                ]);
            }
        });
    }
}
