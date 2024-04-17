<?php

namespace Database\Factories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {

        return [
            'post_id' => $this->faker->numberBetween(1, 502),
            'user_id' => $this->faker->unique()->numberBetween(1, 20),
            'liked' => $this->faker->boolean()
        ];
    }
}
