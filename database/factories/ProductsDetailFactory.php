<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

class ProductsDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => Product::factory(),
            'weight' => $this->faker->word(),
            'description' => $this->faker->paragraph(),
            'composition' => $this->faker->word(),
            'features' => $this->faker->sentence()
        ];
    }
}
