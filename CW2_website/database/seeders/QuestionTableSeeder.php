<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Question::factory()->count(5)->create([
            'questionnaire_id' => 1,
        ]);

        Question::factory()->count(4)->create([
            'questionnaire_id' => 2,
        ]);
    }
}
