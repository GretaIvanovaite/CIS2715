<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuestionOption;

class QuestionOptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        QuestionOption::factory()->count(5)->create([
            'question_id' => 3,
        ]);

        QuestionOption::factory()->count(5)->create([
            'question_id' => 4,
        ]);

        QuestionOption::factory()->count(4)->create([
            'question_id' => 5,
        ]);
    }
}
