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

        // Seeding //
        // From Blank
        Post::factory(3)->create();

        // with dependencies

        // multiple posts from a user
        $user = User::factory()->create([
            'name' => 'Jose'
        ]);
        Post::factory(3)->create([
            'user_id' => $user->id
        ]);

        // multiple posts with the same category
        $category = Category::factory()->create();

        Post::factory(4)->create([
            'category_id' => $category->id
        ]);

    }
}
