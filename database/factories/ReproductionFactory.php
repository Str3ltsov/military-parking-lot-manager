<?php

declare(strict_types=1);

namespace Database\Factories;

use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reproduction>
 */
final class ReproductionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $brandCount = DB::table('brands')->count();

        if ($brandCount === 0) {
            logger()->error('No brands found for generating reproductions.');
            throw new Exception('No brands found for generating reproductions.');
        }

        return [
            'brand_id' => random_int(1, $brandCount),
            'name' => mb_ucfirst(fake()->unique()->word()),
        ];
    }
}
