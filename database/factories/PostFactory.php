<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
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
        $users = User::all('id');

        return [
            'user_id' => $users->random(),
            'content' => fake()->paragraphs(rand(1, 5), true),
            'created_at' => fake()->dateTimeBetween($startDate = '-1 year', $endDate = 'now', config('app.timezone')),
            'updated_at' => now(),
        ];
    }
}
