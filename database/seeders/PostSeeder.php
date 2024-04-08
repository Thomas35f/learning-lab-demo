<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Post;
use App\Models\Article;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $posts = Post::factory(15)->create();
    }
}
