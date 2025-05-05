<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Questionnaire>
 */
class QuestionnaireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $acceptedStatus = ['In development', 'Live', 'Closed'];
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'consent' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement($acceptedStatus),
        ];
    }
}
