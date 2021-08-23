<?php

namespace Database\Factories;

use App\Models\Cinema_Seat;
use Illuminate\Database\Eloquent\Factories\Factory;

class Cinema_SeatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cinema_Seat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'seatNumber' => $this->faker->randomDigitNotNull,
        'type' => $this->faker->randomElement(]),
        'cinema_halls_id' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
