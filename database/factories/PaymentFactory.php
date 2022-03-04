<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'payment_type' => $this->faker->word(),
            'payment_date' => $this->faker->dateTime(),
            'payment_amount' => $this->faker->numberBetween(1,50)
        ];
    }
}
