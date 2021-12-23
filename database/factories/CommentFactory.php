<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Article;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'author_email' => $this->faker->email(),
            'message' => $this->faker->paragraph(),
            'article_id' => Article::factory()
        ];
    }
}
