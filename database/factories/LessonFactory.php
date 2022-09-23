<?php

namespace Database\Factories;

use App\Models\Series;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'title' => $this->faker->sentence(4),
                'description' => $this->faker->paragraph(3),
                'episode_number' => rand(1, 10),
                'image_url' => $this->faker->imageUrl(),
                'vedio_id' => 750034368,
                'series_id' => Series::all()->random()->id,
        ];
    }
}
