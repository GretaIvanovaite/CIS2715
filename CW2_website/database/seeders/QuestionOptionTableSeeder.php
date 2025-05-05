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
        QuestionOption::create([
            'text' => "Web security",
            'question_id' => 2,
        ]);

        QuestionOption::create([
            'text' => "Accessibility",
            'question_id' => 2,
        ]);

        QuestionOption::create([
            'text' => "HTML & CSS",
            'question_id' => 2,
        ]);

        QuestionOption::create([
            'text' => "Lego",
            'question_id' => 2,
        ]);

        QuestionOption::create([
            'text' => "Laravel",
            'question_id' => 3,
        ]);

        QuestionOption::create([
            'text' => "Data analytics",
            'question_id' => 3,
        ]);

        QuestionOption::create([
            'text' => "Database management",
            'question_id' => 3,
        ]);

        QuestionOption::create([
            'text' => "Lego",
            'question_id' => 3,
        ]);

        QuestionOption::create([
            'text' => "Greta",
            'question_id' => 4,
        ]);

        QuestionOption::create([
            'text' => "Adam",
            'question_id' => 4,
        ]);

        QuestionOption::create([
            'text' => "Natalie",
            'question_id' => 4,
        ]);

        QuestionOption::create([
            'text' => "Craig",
            'question_id' => 4,
        ]);

        QuestionOption::create([
            'text' => "David",
            'question_id' => 4,
        ]);

        QuestionOption::create([
            'text' => "Ali",
            'question_id' => 4,
        ]);

        QuestionOption::create([
            'text' => "Benjamin",
            'question_id' => 4,
        ]);

        QuestionOption::create([
            'text' => "Charlie",
            'question_id' => 4,
        ]);

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
