<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // $second_comment = Comment::inRandomOrder()->first();
        $created = fake()->dateTimeBetween('-10 days');

        return [
            'comment' => fake()->text(),
            'created_at' => $created,
            // 'comment_id' => Arr::random([true, false]) ? ($second_comment ? $second_comment->id : null) : null,
            // 'deleted_at' => Arr::random([true, false, false, false]) ? now() : null,
            'deleted_at' => !(rand(1, 100) % 8) ? now() : null,
            'updated_at' => fake()->dateTimeBetween($created),
        ];
    }
}
