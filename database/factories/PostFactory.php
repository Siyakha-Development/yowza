<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

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
    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->sentence,
            'post_content' => $this->faker->paragraphs(rand(3, 7), true),
            'description' => $this->faker->sentence,
            'image' => $this->faker->imageUrl(),
            'status' => $this->faker->randomElement(['draft', 'published', 'archived']),
            'user_id' => User::factory(),  // Associate with a user
        ];
    }
}
