<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'deleted_at' => Arr::random([true, false, false, false]) ? now() : null,
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => Arr::random([true, false]) ? now() : null,
            'username' => fake()->username(),
            'role' => Arr::random(['admin', 'contributor', 'subscriber'])
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
