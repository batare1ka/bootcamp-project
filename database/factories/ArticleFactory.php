<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\BlogCategory;
use App\Models\User;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'category_id' => BlogCategory::factory(),
            'author_id' => User::factory(),
            'published_at' => $this->faker->dateTime(),
            'excerpt' => $this->faker->sentence(),
            'image' => $this->faker->image('storage/app/public', $width = 600, $height = 388, $category = null, $fullPath = false),
            'seo_title' => $this->faker->sentence(),
            'seo_description' => $this->faker->sentence()
        ];
    }
}
