<?php

namespace Database\Factories;

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
        return [
            'name' => $this->faker->unique()->sentence(2),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 1, 100),
            'new_price' => $this->faker->optional()->randomFloat(2, 1, 100),
            'preparation_time' => $this->faker->numberBetween(5, 120), // Preparation time in minutes
            'calories' => $this->faker->numberBetween(100, 800),
            'slug' => $this->faker->slug(),
            'image_url' => NULL ,
            'category_id' => null, // Will be set when creating products
            'available' => $this->faker->boolean(),
            'enabled' => $this->faker->boolean(),
            'new' => $this->faker->boolean(),
            'spicy' => $this->faker->boolean(),
            'vegan' => $this->faker->boolean(),
            'dairy_free' => $this->faker->boolean(),
            'top_seller' => $this->faker->boolean(),
            'featured' => $this->faker->boolean(),
        ];
    }
}
