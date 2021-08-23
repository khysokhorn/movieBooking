<?php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number_of_seat' => $this->faker->word,
        'time_stamp' => $this->faker->word,
        'status' => $this->faker->word,
        'users_id' => $this->faker->randomDigitNotNull,
        'users_id' => $this->faker->randomDigitNotNull,
        'users_id' => $this->faker->randomDigitNotNull,
        'shows_id' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
