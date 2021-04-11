<?php

namespace Database\Factories;

use App\Models\HoroscopePrediction;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class HoroscopePredictionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HoroscopePrediction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'prediction' => Str::random(10),
            'score' => $this->faker->numberBetween(1, 10)
        ];
    }
}
