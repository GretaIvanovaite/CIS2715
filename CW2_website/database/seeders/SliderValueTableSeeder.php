<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SliderValue;

class SliderValueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SliderValue::factory()->create([
            'min' => 0,
            'max' => 100,
            'step' => 10,
        ]);
    }
}
