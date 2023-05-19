<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'name' => $this->faker->unique()->name(),
            'purchased' => $this->faker->numberBetween(0, 1000),
            'discount' => $this->faker->numberBetween(0, 85),
            
        ];
    }
}
