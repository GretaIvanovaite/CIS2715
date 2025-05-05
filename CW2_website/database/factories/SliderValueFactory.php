<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SliderValue>
 */
class SliderValueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $min_value = $this->faker->numberBetween(0, 1000);
        $max_value = $this->faker->numberBetween($min_value, 10000);
        $step = $this->faker->numberBetween(0, 20);
        return [
            'min' => $min_value,
            'max' => $max_value,
            'step' => $step,
        ];
    }
}
