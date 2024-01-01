<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\CategorySub;
use App\Models\CategorySubSub;
use App\Models\Colour;
use App\Models\Coupen;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'is_admin' => true,
        ]);
        User::factory()->create([
            'name' => 'Test User 1',
            'email' => 'test1@example.com',
        ]);
        User::factory()->create([
            'name' => 'Test User 2',
            'email' => 'test2@example.com',
        ]);
        User::factory(7)->create();

        Category::factory(10)->create();
        
        Brand::factory(10)->create();

        Product::factory(100)->create();

        Colour::factory(10)->create();

        Coupen::factory()->create([
            'name' => 'Discount 25% Off',
            'discount' => '25'
        ]); 
        Coupen::factory()->create([
            'name' => 'Discount $10 Off',
            'is_percent' => false,
            'discount' => '10'
        ]); 

        CategorySub::factory(50)->create();

        CategorySubSub::factory(200)->create();

        Wishlist::factory(100)->create();

        Cart::factory(100)->create();

        Review::factory(100)->create();
    }
}
