<?php

namespace Database\Factories;

use App\Models\CategorySub;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CategorySubSub>
 */
class CategorySubSubFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $sub_cats = CategorySub::pluck('_id')->toArray();

        return [
            'name' => fake()->word(),
            'category_sub_id' => fake()->randomElement($sub_cats)
        ];
    }
}
