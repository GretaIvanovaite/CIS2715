<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ColumnValue;

class ColumnValueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ColumnValue::create([
            'text' => "Really badly",
            'question_id' => 4,
        ]);

        ColumnValue::create([
            'text' => "Badly",
            'question_id' => 4,
        ]);

        ColumnValue::create([
            'text' => "Okay",
            'question_id' => 4,
        ]);

        ColumnValue::create([
            'text' => "Well",
            'question_id' => 4,
        ]);

        ColumnValue::create([
            'text' => "Really well",
            'question_id' => 4,
        ]);

        ColumnValue::factory()->count(4)->create([
            'question_id' => 5,
        ]);
    }
}
