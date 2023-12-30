<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoryIds = Category::pluck('_id')->toArray();
        $brandIds = Brand::pluck('_id')->toArray();
        $UserIds = User::pluck('_id')->toArray();

        return [
            'name' => fake()->name(),
            'thumb_link' => '240.png',
            'price' => rand(1000, 25000),
            'des' => fake()->paragraph(),
            'category_id' => fake()->randomElement($categoryIds),
            'brand_id' => fake()->randomElement($brandIds),
            'user_id' => fake()->randomElement($UserIds),
        ];
    }
}
