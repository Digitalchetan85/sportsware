<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $slider_title = $this->faker->unique()->words($nb=4, $asText=true);
        return [
            'title' => $slider_title,
            'subtitle' => $this->faker->text(50),
            'price' => $this->faker->numberBetween(10,500),
            'link' => '/',
            'image' => 'main-slider-'.$this->faker->numberBetween(1,3).'.jpg',
            'status' => true,
        ];
    }
}
