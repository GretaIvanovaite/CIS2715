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
        Questionnaire::factory()->count(5)->create([
            'status' => 'Live',
            'user_id' => 1,
        ]);

        Questionnaire::factory()->create([
            'status' => 'In development',
            'user_id' => 1,
        ]);
    }
}
