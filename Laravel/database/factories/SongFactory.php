<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Genre;

class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => Str::random(10),
            "artist" => $this->faker->name(),
            "duration" => $this->faker->dateTimeBetween("00:01:00", "00:04:00"),
            "genre_id" => Genre::all()->random()->id
        ];
    }
}
