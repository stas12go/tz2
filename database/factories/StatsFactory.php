<?php

namespace Database\Factories;

use App\Models\User;
use DateInterval;
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
     */
    public function definition()
    {
        $usersCount = User::all()->count();
        $userID = rand(1, $usersCount);
        $userIP = join('.', [rand(0, 255), rand(0, 255), rand(0, 255), rand(0, 255)]);

        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $phpSessId = '';
        for ($i = 1; $i <= 26; $i++) {
            $phpSessId .= $characters[rand(0, $charactersLength - 1)];
        }

        $randomDateTime = $this->faker->dateTimeBetween('-1 month', 'now');
        $visitedAt = $randomDateTime->format('Y-m-d H:i:s');
        $leftAt = $randomDateTime->add(new DateInterval('PT' . rand(1, 15 * 60) . 'S'))->format('Y-m-d H:i:s');

        return [
            'user_id' => $userID,
            'user_IP' => $userIP,
            'SID' => $phpSessId,
            'visited_at' => $visitedAt,
            'left_at' => $leftAt
        ];
    }
}
