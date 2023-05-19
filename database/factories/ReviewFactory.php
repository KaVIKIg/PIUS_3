<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Review;
use App\Models\Customer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            
            'name' => $this->faker->unique()->text(50),
            'description' => $this->faker->text(350),
            'like' => $this->faker->numberBetween(0, 1000),
            'dislike' => $this->faker->numberBetween(0, 500),
            'customer_id' => Customer::factory(),
        ];
    }
}
