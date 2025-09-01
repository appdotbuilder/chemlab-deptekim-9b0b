<?php

namespace Database\Factories;

use App\Models\Lab;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $role = fake()->randomElement(['admin', 'kepala_lab', 'laboran', 'dosen', 'mahasiswa']);
        
        return [
            'name' => fake()->name(),
            'email' => $this->generateEmailForRole($role),
            'role' => $role,
            'lab_id' => $role === 'admin' ? null : Lab::factory(),
            'student_id' => $role === 'mahasiswa' ? fake()->numerify('########') : null,
            'staff_id' => $role !== 'mahasiswa' ? fake()->numerify('######') : null,
            'status' => $role === 'mahasiswa' ? 'menunggu_verifikasi' : 'active',
            'must_change_password' => false,
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Generate appropriate email based on role.
     */
    protected function generateEmailForRole(string $role): string
    {
        $username = fake()->userName();
        
        return match ($role) {
            'mahasiswa' => $username . '@ui.ac.id',
            default => $username . '@che.ui.ac.id'
        };
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Create an admin user.
     */
    public function admin(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'admin',
            'email' => 'admin@che.ui.ac.id',
            'lab_id' => null,
            'staff_id' => '000001',
            'status' => 'active',
        ]);
    }

    /**
     * Create a laboran user.
     */
    public function laboran(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'laboran',
            'email' => fake()->userName() . '@che.ui.ac.id',
            'staff_id' => fake()->numerify('######'),
            'status' => 'active',
        ]);
    }

    /**
     * Create a mahasiswa user.
     */
    public function mahasiswa(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'mahasiswa',
            'email' => fake()->userName() . '@ui.ac.id',
            'student_id' => fake()->numerify('########'),
            'staff_id' => null,
            'status' => 'menunggu_verifikasi',
        ]);
    }
}
