<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class SeriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(3);
        return [
            'title' => $title,
            "slug" => Str::slug($title),
            'description' =>  $this->faker->sentence(30) ,
            'image_url' => $this->faker->imageUrl(),
        ];
    }
}
