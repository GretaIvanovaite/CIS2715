<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Response>
 */
class ResponseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $question = $this->faker->numberBetween(1, 6);
        $option = $this->faker->numberBetween(1, 3);
        return [
            'question_id' => $question,
            'option_id' => $option,
            'selection' => $this->faker->word(),
            'text_answer' => $this->faker->sentence(),
        ];
    }
}
