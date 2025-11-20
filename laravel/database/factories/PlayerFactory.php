<?php

namespace Database\Factories;

use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Player::class;
    public function definition(): array
    {   
        $wappen = [
            './public/Wappen1.png',
            './public/Wappen2.png',
            './public/Wappen3.png',
            './public/Wappen4.png',
            './public/Wappen5.png'
        ];

        return [
            'name' => fake('de_DE')->firstName() . ' ' . fake('de_DE')->lastName(),
            'city' => fake('de_DE')->city(),
            'score' => rand(1,1111),
            'wappen' => fake()->randomElement($wappen)
        ];
    }
}
