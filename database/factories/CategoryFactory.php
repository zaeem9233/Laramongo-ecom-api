<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $cats = ['Men', 'Women', 'Kid', 'Home', 'Electronics', 'TV & Home', 'Sports', 'Automotive', 'Health', 'Laptops', 'Mobiles', 'Bikes', 'Jewellery'];

        return [
            'name' => fake()->word(),
            'des' => fake()->paragraph(),
            'meta_title' => fake()->name(),
            'meta_keyword' => fake()->sentence(),
            'meta_des' => fake()->sentence(),
        ];
    }
}
