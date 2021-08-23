<?php

namespace Database\Factories;

use App\Models\MovieApp;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieAppFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MovieApp::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
        'description' => $this->faker->word,
        'duration' => $this->faker->word,
        'reaseDate' => $this->faker->word,
        'country' => $this->faker->word,
        'genre' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
