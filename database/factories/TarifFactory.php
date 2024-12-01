<?php

namespace Database\Factories;

use App\Models\Tarif;
use Illuminate\Database\Eloquent\Factories\Factory;

class TarifFactory extends Factory
{
    protected $model = Tarif::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word, // Generates a random word for the tarif name
            'code' => $this->faker->unique()->word, // Generates a unique random word for the tarif code
        ];
    }
}