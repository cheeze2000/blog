<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition()
    {
        $title = ucwords(fake()->words(6, true));
        $content = fake()->sentences(9, true);

        return [
            'title' => $title,
            'description' => fake()->sentence(),
            'slug' => Str::of($title)->slug(),
            'thumbnail' => fake()->imageUrl(),
            'content' => fake()->sentences(9, true),
            'read_time' => ceil(strlen($content) / 500),
            'published' => fake()->boolean(),
            'pinned' => fake()->boolean(),
        ];
    }
}
