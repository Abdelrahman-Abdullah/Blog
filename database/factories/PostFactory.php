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
            'user_id'     => User::factory(), // User Factory Will Create A new User and Assign Its id To user_id
            'category_id' => Category::factory(), // Same But In Category
            'title'       => $this->faker->company,
            'body'        => $this->faker->paragraph(8),
        ];
    }
}
