<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Tarif;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductHasTarifFactory extends Factory
{
    protected $model = \App\Models\ProductHasTarif::class; // Adjust this to your actual model if you have one

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->numberBetween(1,10), // Creates a new product or assigns an existing one
            'tarif_id' => $this->faker->numberBetween(3,3), // Creates a new tarif or assigns an existing one
            'isDefault'=>$this->faker->boolean(50),
            'sale_price'=>$this->faker->randomFloat(2, 1,100)
        ];
    }
}