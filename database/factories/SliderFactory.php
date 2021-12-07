<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Slider;

class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slider_title' => $this->faker->sentence($nbWords = 2, $variableNbWords = true),
            'slider_description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'btn_link' => $this->faker->url(),
            'btn_title' => $this->faker->name(),
            'image' => '',
            'status' => true,
        ];
    }
}
