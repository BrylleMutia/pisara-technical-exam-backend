<?php

namespace Database\Factories;

use App\Models\Photo;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhotoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Photo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'albumId' => $this->faker->numberBetween(1, 20),
            'title' => $this->faker->realText(20),
            'url' => $this->faker->url,
            'thumbnailUrl' => $this->faker->url,
        ];
    }
}
