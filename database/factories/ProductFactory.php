<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category; // Import the Category model
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word, // Generates a random word for the product name
            'barcode' => $this->faker->unique()->numerify('###########'), // Generates a unique 13-digit barcode
            'sku' => $this->faker->unique()->word, // Generates a unique SKU
            'description' => $this->faker->optional()->paragraph, // Generates an optional description
            'cost' => $this->faker->randomFloat(2, 1, 1000), // Generates a random cost between 1 and 1000
            'stock_management' => $this->faker->boolean, // Randomly true or false
            'stock' => $this->faker->numberBetween(0, 100), // Generates a random stock quantity between 0 and 100
            'category_id' => $this->faker->numberBetween(1,10), // Creates a new category or assigns an existing one
        ];
    }
}