<?php

namespace Database\Seeders;

use App\Models\Post;
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
        Post::factory()->count(300)
            ->sequence(fn ($sequence) => ['image' => $this->set_image($sequence->index)])
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

        $wArray = [1280, 1024, 960, 720];
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
        DB::table('posts')->truncate();
    }
}
