<?php

namespace Database\Factories;

use App\Models\CinemaHall;
use Illuminate\Database\Eloquent\Factories\Factory;

class CinemaHallFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CinemaHall::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'totalSeat' => $this->faker->randomDigitNotNull,
        'cinema_id' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
