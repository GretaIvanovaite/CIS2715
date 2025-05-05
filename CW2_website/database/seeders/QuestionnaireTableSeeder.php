<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Questionnaire;

class QuestionnaireTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Questionnaire::create([
        "title" => "How we feel about the teaching staff for the web course",
        "description" => "This questionnaire is just an example to showcase the capabilities of the website and the different types of questions.",
        "consent" => "No personal data will be collected and you can decide to stop responding at any point and select \"Cancel\" which will allow you to remove any information already provided to the questionnaire.",
        "status" => "Live",
        "user_id" => 1,
        ]);


        Questionnaire::factory()->create([
            'user_id' => 1,
            'status' => 'Live',
        ]);

        Questionnaire::factory()->count(10)->create([
            'user_id' => 1,
        ]);
    }
}
