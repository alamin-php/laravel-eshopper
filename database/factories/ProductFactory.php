<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of factory's corresponding model.
     * 
     * @var string
     */
    protected $model = \App\Models\Product::class;
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
            'name' => $faker->name,
            'short_description' => $faker->sentence($nbWords = 2, $variableNbWords = true),
            'long_description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
            'price' => $faker->numberBetween($min = 900, $max = 10000),
            'image' => 'default.jpg',
            'size' => '3 Inc',
            'color' => 'black',
            'status' => true,
        ];
    }
}
