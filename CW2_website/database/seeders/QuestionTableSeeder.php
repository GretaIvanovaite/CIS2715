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
        Question::factory()->create([
            'questionnaire_id' => 1,
            'type' => 'Short-text',
        ]);

        Question::factory()->create([
            'questionnaire_id' => 1,
            'type' => 'Long-text',
        ]);

        Question::factory()->create([
            'questionnaire_id' => 1,
            'type' => 'Tick-one',
        ]);

        Question::factory()->create([
            'questionnaire_id' => 1,
            'type' => 'Tick-many',
        ]);

        Question::factory()->create([
            'questionnaire_id' => 1,
            'type' => 'Grid',
        ]);

        Question::factory()->create([
            'questionnaire_id' => 1,
            'type' => 'Scale',
        ]);

        Question::factory()->count(4)->create([
            'questionnaire_id' => 2,
        ]);

        for ($questionnaire_id=3; $questionnaire_id < 12; $questionnaire_id++) { 
            Question::factory()->count(4)->create([
                'questionnaire_id' => $questionnaire_id,
            ]);
        }
    }
}
