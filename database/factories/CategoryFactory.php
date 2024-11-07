<?php

namespace Database\Factories;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word(),
            'description' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'enabled' => $this->faker->boolean(),
            'featured' => $this->faker->boolean(),
            'sort' => 0, // Placeholder, will be set during seeding
        ];
    }
}
