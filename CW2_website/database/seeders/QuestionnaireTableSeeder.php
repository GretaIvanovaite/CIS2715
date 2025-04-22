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
        Questionnaire::factory()->create([
            'title' => 'Test Questionnaire',
            'description' => 'Example Questionnaire Description',
            'status' => 'Live',
            'user_id' => 1,
        ]);
    }
}
