<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user_ids = User::pluck('_id')->toArray();
        $product_ids = Product::pluck('_id')->toArray();
        return [
            'user_id' => fake()->randomElement($user_ids),
            'product_id' => fake()->randomElement($product_ids),
            'comment' => fake()->sentence(),
        ];
    }
}
