<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rank>
 */
final class RankFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->unique()->title(),
            'short_title' => mb_strtoupper(fake()->unique()->text(random_int(5, 15))),
            'grade' => mb_strtoupper(fake()->text(4)),
        ];
    }
}
