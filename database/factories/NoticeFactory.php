<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoticeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //User::all()->random()->name, 
            'creator' => $this->faker->randomElement(['Super', 'Admin']),
            'image' => 'notices/' . $this->faker->image('public/storage/notices', 1280, 500, null, false),
            'studen_notice' => $this->faker->randomElement(['Yes', 'No'])
        ];
    }
}
