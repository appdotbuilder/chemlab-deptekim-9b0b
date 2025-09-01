<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lab>
 */
class LabFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(3, true) . ' Lab',
            'description' => fake()->paragraph(),
            'location' => fake()->address(),
            'capacity' => fake()->numberBetween(10, 50),
            'operating_hours' => [
                'monday' => ['08:00', '17:00'],
                'tuesday' => ['08:00', '17:00'],
                'wednesday' => ['08:00', '17:00'],
                'thursday' => ['08:00', '17:00'],
                'friday' => ['08:00', '17:00'],
                'saturday' => null,
                'sunday' => null,
            ],
            'contact_phone' => fake()->phoneNumber(),
            'contact_email' => fake()->email(),
            'gallery' => null,
            'sop' => fake()->paragraph(5),
            'rules' => fake()->paragraph(3),
            'is_active' => true,
        ];
    }

    /**
     * Indicate that the lab is inactive.
     */
    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => false,
        ]);
    }
}