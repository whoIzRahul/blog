<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'user_id' => Category::factory(),
            'category_id' => Category::factory()->create(),
            'title' => fake()->name(),
            'slug' => fake()->word(),
            'excerpt' => '<p>'.implode('</p><p>',fake()->paragraphs(2)).'</p>',
            'body' => '<p>'.implode('</p><p>',fake()->paragraphs(4)).'</p>',
        ];
    }
}
