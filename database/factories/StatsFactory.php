<?php

namespace Database\Factories;

use App\Models\User;
use DateInterval;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class StatsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws Exception
     */
    public function definition()
    {
        $usersCount = User::all()->count();
        $userID = rand(1, $usersCount);
        $userIP = join('.', [rand(0, 255), rand(0, 255), rand(0, 255), rand(0, 255)]);

        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);

        $randomDateTime = $this->faker->dateTimeBetween('-12 month', 'now');
        $visitedAt = $randomDateTime->format('Y-m-d H:i:s');
        $leftAt = $randomDateTime->add(new DateInterval('PT' . rand(1, 15 * 60) . 'S'))->format('Y-m-d H:i:s');

        return [
            'user_id' => $userID,
            'user_IP' => $userIP,
            'visited_at' => $visitedAt,
            'left_at' => $leftAt
        ];
    }
}
