<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition(): array
    {
        $users = User::all('id');

        return [
            'user_id' => $users->random(),
            'content' => $this->faker->paragraphs(rand(1, 5), true),
            'created_at' => $this->faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now', config('app.timezone')),
            'updated_at' => now(),
        ];
    }
}
