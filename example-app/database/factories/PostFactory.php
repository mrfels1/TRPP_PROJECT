<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'tags' => 'test, post',
            'author_id' => 1,
            'upvotes' => $this->faker->numberBetween(1, 10000),
            'downvotes' => $this->faker->numberBetween(1, 10000),
            'text_content' => $this->faker->paragraph(3)
        ];
    }
}
