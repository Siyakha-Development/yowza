<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create users
        $users = User::factory()->count(10)->create();
        // Create categories
        $categories = Category::factory()->count(5)->create();

        // Create tags
        $tags = Tag::factory()->count(10)->create();

        Post::factory()->count(20)->create()->each(function ($Post) use ($categories, $tags, $users) {
            // Associate with a user
            $Post->user()->associate($users->random())->save();

            // Attach categories
            $Post->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );

            // Attach tags
            $Post->tags()->attach(
                $tags->random(rand(1, 5))->pluck('id')->toArray()
            );
        });
    }
}
