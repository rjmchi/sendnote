<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'recipient' => fake()->safeEmail(),
            'body' => fake()->paragraph(2),
            'send_date' => fake()->dateTimeThisYear('+2 months'),
            'user_id'=>1,
        ];
    }
}
