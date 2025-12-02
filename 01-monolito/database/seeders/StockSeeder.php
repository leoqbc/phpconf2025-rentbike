<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stock::create([
            'motorcycle_id' => 1,
            'daily_price' => 10_00 // equivale a 10.00
        ]);

        Stock::create([
            'motorcycle_id' => 1,
            'daily_price' => 12_00 // equivale a 10.00
        ]);

        Stock::create([
            'motorcycle_id' => 2,
            'daily_price' => 12_00 // equivale a 10.00
        ]);

        Stock::create([
            'motorcycle_id' => 2,
            'daily_price' => 13_00 // equivale a 10.00
        ]);

        Stock::create([
            'motorcycle_id' => 3,
            'daily_price' => 14_00 // equivale a 10.00
        ]);

        Stock::create([
            'motorcycle_id' => 4,
            'daily_price' => 14_00 // equivale a 10.00
        ]);

        Stock::create([
            'motorcycle_id' => 4,
            'daily_price' => 20_00 // equivale a 10.00
        ]);

        Stock::create([
            'motorcycle_id' => 5,
            'daily_price' => 25_00 // equivale a 10.00
        ]);

        Stock::create([
            'motorcycle_id' => 5,
            'daily_price' => 25_00 // equivale a 10.00
        ]);
    }
}
