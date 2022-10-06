<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncate_table();

        $users = User::inRandomOrder()->pluck('id')->toArray();

        Post::factory()->count(100)
            ->sequence(fn ($sequence) => ['image' => $this->set_image($sequence->index)])
            ->has(
                Comment::factory()
                    ->sequence(fn () => ['user_id' => Arr::random($users)])
                    ->has(
                        Like::factory()->sequence(fn () => ['user_id' => Arr::random($users)])
                            ->count(rand(3, 6)),
                        'likes'
                    )
                    ->count(rand(4, 8))
            )
            ->has(
                Like::factory()->sequence(fn () => ['user_id' => Arr::random($users)])
                    ->count(rand(10, 20)),
                'likes'
            )
            ->create();
    }

    public function set_image($index)
    {
        if (!Arr::random([true, false])) {
            return null;
        }

        $imageCategories = [
            'face',
            'fashion',
            'shoes',
            'watch',
            'furniture',
        ];

        $wArray = [1920, 1440, 1280, 960];
        $width = Arr::random($wArray);
        $mod = $index % 3;
        switch ($mod) {
            case 0:
                $height = $width / 2;
                break;

            case 2:
                $height = ceil($width / 2.5);
                break;

            case 1:
            default:
                $height = $width;
        }

        return "https://api.lorem.space/image/" . Arr::random($imageCategories) . "?w={$width}&h={$height}";
    }

    public function truncate_table()
    {
        DB::table('comments')->truncate();
        DB::table('likes')->truncate();
        DB::table('posts')->truncate();
    }
}
