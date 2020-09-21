<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use DateTime;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'user_id' => $this->faker->numberBetween($min = 1, $max = 10),
        'title' => $this->faker->word,
        'content' => $this->faker->text,
        'image' => $this->faker->randomElement([
            'http://localhost:8000/storage/01.png',
            'http://localhost:8000/storage/02.png',
            'http://localhost:8000/storage/03.png',
        ]),
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
        ];
    }
}
