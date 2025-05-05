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
        Question::create([
            "type" => "Range",
            "text" => "On a scale from 1 to 100 (1 being really terrible and 100 being amazing), how well do you think Dan is doing as a tutor?",
            "required" => "Y",
            "questionnaire_id" => 1,
        ]);
        
        Question::create([
            "type" => "Grid",
            "text" => "How well do you feel these topics are explained?",
            "required" => "Y",
            "questionnaire_id" => 1,
        ]);
        
        Question::create([
            "type" => "Tick-many",
            "text" => "Which of these topics do you feel like you understand after this academic year?",
            "required" => "Y",
            "questionnaire_id" => 1,
        ]);
        
        Question::create([
            "type" => "Tick-one",
            "text" => "Who is your favourite groupmate?",
            "required" => "Y",
            "questionnaire_id" => 1,
        ]);

        Question::create([
            "type" => "Short-text",
            "text" => "In short, please describe the best thing that has happened this academic year",
            "required" => "Y",
            "questionnaire_id" => 1,
        ]);
        
        Question::create([
            "type" => "Long-text",
            "text" => "Explain in detail why you are finishing the coursework on the last day",
            "required" => "Y",
            "questionnaire_id" => 1,
        ]);

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
            'type' => 'Range',
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
