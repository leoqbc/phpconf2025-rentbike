<?php

namespace Database\Seeders;

use App\Models\Motorcycle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MotorcycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Motorcycle::create([
            'name' => 'Lightning',
            'brand' => 'Lightning Motorcycle',
            'model' => 'LS‑218'
        ]);
        Motorcycle::create([
            'name' => 'Brammo',
            'brand' => 'Brammo',
            'model' => 'Enertia'
        ]);
        Motorcycle::create([
            'name' => 'Kawasaki e‑1',
            'brand' => 'Kawasaki',
            'model' => 'e-1'
        ]);
        Motorcycle::create([
            'name' => 'Shineray SE1',
            'brand' => 'Shineray Motorcycle',
            'model' => 'SE1'
        ]);
        Motorcycle::create([
            'name' => 'Voltz EV1 Sport',
            'brand' => 'Voltz Motors',
            'model' => 'EV1 Sport'
        ]);
    }
}
