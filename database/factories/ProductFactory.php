<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Brand;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'brand_id' => Brand::factory(),
            'name' => $this->faker->unique()->word(),
            'price' => $this->faker->numberBetween(1,50),
            'img_large_url' => $this->faker->image('storage/app/public', $width = 600, $height = 388, $category = null, $fullPath = false),
            'img_small_url'  => $this->faker->word()
        ];
    }
}
