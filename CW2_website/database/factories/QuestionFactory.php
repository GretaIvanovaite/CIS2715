<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $acceptedTypes = ['Short-text', 'Long-text', 'Tick-one', 'Tick-many', 'Grid', 'Range'];
        return [
            'text' => $this->faker->sentence(),
            'type' => $this->faker->randomElement($acceptedTypes),
        ];
    }
}
