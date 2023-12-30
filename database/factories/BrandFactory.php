<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $brands = [
            'Addidas',
            'Nike',
            'Puma',
            'MRF',
            'CA',
            'Hush Puppies',
            'Bata',
            'Service',
            'English Shoes',
            'Borjan',
            'Oxford',
            'Unze London',
        ];

        $categoryIds = Category::pluck('_id')->toArray();

        return [
            'name' => fake()->randomElement($brands),
            'category_id' => fake()->randomElement($categoryIds),
        ];
    }
}
