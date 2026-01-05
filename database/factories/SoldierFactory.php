<?php

declare(strict_types=1);

namespace Database\Factories;

use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Soldier>
 */
final class SoldierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rankCount = DB::table('ranks')->count();

        if ($rankCount === 0) {
            logger()->error('No ranks found for generating soldiers.');
            throw new Exception('No ranks found for generating soldiers.');
        }

        return [
            'rank_id' => random_int(1, $rankCount),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'phone_number' => fake()->unique()->phoneNumber(),
        ];
    }
}
