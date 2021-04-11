<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ZodiacSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Zodiac::factory()->count(12)->state(new Sequence(
            ['name' => 'Aquarius'],
            ['name' => 'Pisces'],
            ['name' => 'Aries'],
            ['name' => 'Taurus'],
            ['name' => 'Gemini'],
            ['name' => 'Cancer'],
            ['name' => 'Leo'],
            ['name' => 'Virgo'],
            ['name' => 'Libra'],
            ['name' => 'Scorpio'],
            ['name' => 'Sagittarius'],
            ['name' => 'Capricorn']
        ))->create();
    }
}
