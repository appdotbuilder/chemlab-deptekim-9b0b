<?php

namespace Database\Factories;

use App\Models\Lab;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipment>
 */
class EquipmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = ['Analytical', 'Thermal', 'Mechanical', 'Electrical', 'Chemical', 'Safety'];
        $brands = ['Agilent', 'Waters', 'Shimadzu', 'Thermo Fisher', 'PerkinElmer', 'Bruker'];
        $conditions = ['excellent', 'good', 'fair', 'needs_repair'];
        
        return [
            'lab_id' => Lab::factory(),
            'name' => fake()->words(3, true),
            'code' => 'EQ-' . fake()->numerify('####'),
            'category' => fake()->randomElement($categories),
            'description' => fake()->paragraph(),
            'specifications' => [
                'power' => fake()->randomElement(['110V', '220V', '380V']),
                'weight' => fake()->numberBetween(1, 500) . ' kg',
                'dimensions' => fake()->numberBetween(10, 200) . 'x' . fake()->numberBetween(10, 150) . 'x' . fake()->numberBetween(10, 100) . ' cm',
            ],
            'brand' => fake()->randomElement($brands),
            'model' => fake()->bothify('??-####'),
            'serial_number' => fake()->bothify('??########'),
            'purchase_year' => fake()->numberBetween(2015, 2024),
            'purchase_price' => fake()->randomFloat(2, 5000, 500000),
            'condition' => fake()->randomElement($conditions),
            'status' => 'available',
            'location' => 'Room ' . fake()->numberBetween(101, 305),
            'max_loan_duration' => fake()->randomElement([3, 7, 14]),
            'min_competency_level' => fake()->randomElement(['basic', 'intermediate', 'advanced']),
            'photos' => null,
            'manual_url' => null,
            'sop' => fake()->paragraph(3),
            'qr_code' => null,
            'maintenance_schedule' => [
                'frequency' => 'monthly',
                'next_date' => fake()->dateTimeBetween('now', '+3 months')->format('Y-m-d'),
            ],
            'is_active' => true,
        ];
    }

    /**
     * Indicate that the equipment is borrowed.
     */
    public function borrowed(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'borrowed',
        ]);
    }

    /**
     * Indicate that the equipment needs repair.
     */
    public function needsRepair(): static
    {
        return $this->state(fn (array $attributes) => [
            'condition' => 'needs_repair',
            'status' => 'maintenance',
        ]);
    }
}