<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;
use App\Models\Payment;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => Customer::factory(),
            'payment_id' => Payment::factory(),
            'totat_price' => $this->faker->numberBetween(1,50),
            'order_date' => $this->faker->dateTime()
        ];
    }
}
