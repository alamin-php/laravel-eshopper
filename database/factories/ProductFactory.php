<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'cat_id' => rand(1,10),
            'brand_id' => rand(1,10),
            'name' => $this->faker->name(),
            'short_description' => $this->faker->sentence($nbWords = 2, $variableNbWords = true),
            'long_description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'price' => $this->faker->numberBetween($min = 900, $max = 10000),
            'image' => '',
            'size' => $this->faker->numberBetween($min = 2, $max = 10),
            'color' => $this->faker->colorName(),
            'status' => true,
        ];
    }
}
