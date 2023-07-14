<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Truncating DB //
        User::truncate();
        Post::truncate();
        Category::truncate();

        // Seeding //
        $users = User::factory(5)->create();

        // For now manually //

        // Category
        $cat_pers = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        $cat_work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        Category::create([
            'name' => 'Research',
            'slug' => 'research'
        ]);

        // Post
        Post::create([
            'title' => 'My first Post',
            'category_id' => $cat_pers->id,
            'user_id' => $users->first()->id,
            'slug' => 'my-first-post',
            'excerpt' => 'This is my first personal post that is personal',
            'body' => 'for the first one I was gonna try originality but I suck at it - that\'s why I\'m using a CSS framework!'
        ]);

        Post::create([
            'title' => 'My second Post',
            'category_id' => $cat_work->id,
            'user_id' => $users->find(2)->id,
            'slug' => 'my-second-post',
            'excerpt' => 'This is my second post',
            'body' => 'I\'m rapidly running out of creativity - when will chatgpt take over my job and confer to me all the money it makes!?!'
        ]);

    }
}
