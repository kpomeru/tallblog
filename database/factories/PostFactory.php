<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = substr(fake()->sentence(fake()->numberBetween(3, 6)), 0, -1);
        $booleanArray = [false, true];

        $created = fake()->dateTimeBetween('-10 days');

        return [
            'category_id' => Category::inRandomOrder()->first()->id,
            'content' => fake()->paragraphs(fake()->randomDigitNotNull, true),
            'created_at' => $created,
            'excerpt' => fake()->text(),
            'featured_at' => Arr::random([true, false, false, false]) ? fake()->dateTimeBetween($created) : null,
            'published_at' => Arr::random([true, false, false, false]) ? fake()->dateTimeBetween($created) : null,
            'slug' =>  str()->snake($title, '-'),
            'title' =>  $title,
            'updated_at' => fake()->dateTimeBetween($created),
            'user_id' => User::whereNotIn('role', ['subscriber'])->inRandomOrder()->first()->id,
        ];
    }
}
