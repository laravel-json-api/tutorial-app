<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'author_id' => User::factory(),
            'content' => $this->faker->paragraphs(3, true),
            'published_at' => $this->faker->boolean(75) ? $this->faker->dateTime : null,
            'slug' => $this->faker->unique()->slug,
            'title' => $this->faker->words(5, true),
        ];
    }
}
