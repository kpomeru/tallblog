<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'backend',
            'frontend',
            'fullstack',
            'mobile',
            'devops',
        ];

        foreach ($categories as $key => $category) {
            Category::create([
                'title' => $category,
                'slug' => str()->slug($category)
            ]);
        }
    }
}
