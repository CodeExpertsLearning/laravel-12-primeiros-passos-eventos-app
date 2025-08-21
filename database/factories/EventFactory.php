<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->words(4, true);

        return [
            'title' => $title,
            'description' => fake()->sentence,
            'body' => fake()->paragraphs(3, true),
            'slug' => str($title)->slug(),
            'start_event' => fake()->dateTimeInInterval('+1 days', '+30 days'),
            'end_event' => fake()->dateTimeInInterval('+1 days', '+30 days'),
        ];
    }
}
