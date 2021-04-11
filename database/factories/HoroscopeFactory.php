<?php

namespace Database\Factories;

use App\Models\Horoscope;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class HoroscopeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Horoscope::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => Carbon::today(),
            'score' => $this->faker->numberBetween(1, 10),
            'zodiac_id' => $this->faker->numberBetween(1, 12)
        ];
    }

    public function dated($date) {
        return $this->state(function(array $attributes) use ($date) {
            return [
                'date' => $date,
            ];
        });
    }
}
