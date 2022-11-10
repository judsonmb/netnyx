<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::factory()->create();
        return [
            'user_id' => $user->id,
            'media_id' => 60574,
            'media_img' => 'https://image.tmdb.org/t/p/original/vUUqzWa2LnHIVqkaKVlVGkVcZIW.jpg'
        ];
    }
}
