<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Order;

class OrderProductFactory extends Factory
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
            'order_id' => Order::factory(),
            'quantity' => $this->faker->numberBetween(1,50),
            'size' => $this->faker->unique()->word(),
            'color' => $this->faker->unique()->word(),
            'unit_price' => $this->faker->numberBetween(1,50),
            'discount' => $this->faker->numberBetween(1,50)
        ];
    }
}
