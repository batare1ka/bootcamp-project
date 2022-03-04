<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->word(),
            'last_name' => $this->faker->word(),
            'country' => $this->faker->word(),
            'city' => $this->faker->word(),
            'email' => $this->faker->email(),
            'phone_num' => $this->faker->word(),
            'address' => $this->faker->word(),
            'street' => $this->faker->word(),
            'zip_code' => $this->faker->numberBetween(1,50)
        ];
    }
}
