<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class CategoryProductSeeder extends Seeder
{
    public function run()
    {
        // Create 5 categories and get the current max sort value
        $currentMaxSort = Category::max('sort') ?? 0;

        $categories = [];
        for ($i = 1; $i <= 5; $i++) {
            $category = Category::create([
                'name' => fake()->name,
                'description' => fake()->sentence(),
                'slug' => "category-$i",
                'enabled' => fake()->boolean(),
                'featured' => fake()->boolean(),
                'sort' => $currentMaxSort + $i, // Increment sort value
            ]);
            $categories[] = $category; // Store the created category for later use
        }

        // Create 10 products for each newly created category
        foreach ($categories as $category) {
            Product::factory(10)->create(['category_id' => $category->id]);
        }
    }
}
