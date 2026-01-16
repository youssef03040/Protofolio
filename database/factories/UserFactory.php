<?php

namespace Database\Factories;

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
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'is_approved' => true,
            'bio' => fake()->optional()->paragraph(),
            'portfolio_url' => fake()->optional()->url(),
            'role_title' => fake()->optional()->jobTitle(),
            'phone' => fake()->optional()->phoneNumber(),
            'linkedin_url' => fake()->optional()->url(),
            'github_url' => fake()->optional()->url(),
            'languages' => fake()->optional()->words(3, true),
            'hobbies' => fake()->optional()->words(4, true),
            'interests' => fake()->optional()->words(4, true),
            'skills' => fake()->optional()->words(6, true),
            'education' => fake()->optional()->sentences(2, true),
            'work_experience' => fake()->optional()->sentences(2, true),
            'tech_stack' => fake()->optional()->words(5, true),
        ];
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
}
