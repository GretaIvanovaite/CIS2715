<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Response;

class ResponseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i < 47; $i++) {
            Response::factory()->count(4)->create([
                'question_id' => $i,
            ]);
        }
    }
}
