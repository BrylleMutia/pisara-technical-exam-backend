<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Comment;
use App\Models\Photo;
use App\Models\Post;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Post::factory()->count(10)->create();
        Comment::factory()->count(10)->create();
        Album::factory()->count(10)->create();
        Photo::factory()->count(10)->create();
        Todo::factory()->count(10)->create();
        User::factory()->count(10)->create();
    }
}
