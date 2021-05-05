<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'username' => $this->faker->firstName,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'website' => $this->faker->url,
            'address' => json_encode([
                'street' => $this->faker->streetAddress,
                'suite' => $this->faker->secondaryAddress,
                'city' => $this->faker->city,
                'zipcode' => $this->faker->postcode,
                'geo' => [
                    'lat' => $this->faker->latitude,
                    'lng' => $this->faker->longitude
                ]
            ]),
            'company' => json_encode([
                'name' => $this->faker->company,
                'catchPhrase' => $this->faker->realText(20),
                'bs' => $this->faker->realText(10)
            ])
        ];
    }
}
