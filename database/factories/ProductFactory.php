<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->numberBetween(0,100),
            'name' => $this->faker->word,
            'size' => $this->faker->word,
            'price' => $this->faker->numberBetween(0,2000),
            'weight' => $this->faker->numberBetween(0,2000)
        ];
    }
}
