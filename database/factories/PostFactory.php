<?php

namespace Database\Factories;

use App\Post;
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
    protected $model = Post::class;

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
                '01.png',
                '02.png',
                '03.png',
            ]),
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ];
    }
}
