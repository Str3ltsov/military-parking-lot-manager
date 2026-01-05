<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\VehicleCondition;
use App\Enums\VehicleStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;
use RuntimeException;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
final class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $departmentCount = $this->getModelRecordCount('departments');
        $soldierCount = $this->getModelRecordCount('soldiers');
        $locationCount = $this->getModelRecordCount('locations');
        $reproductionCount = $this->getModelRecordCount('reproductions');

        $condition = $this->getRandomCondition();
        $status = $this->getRandomStatus($condition);

        return [
            'department_id' => random_int(1, $departmentCount),
            'soldier_id' => random_int(1, $soldierCount),
            'location_id' => random_int(1, $locationCount),
            'reproduction_id' => random_int(1, $reproductionCount),
            'plate_number' => fake()->unique()->randomNumber(6),
            'condition' => $condition,
            'status' => $status,
            'notes_problems' => fake()->optional()->text(),
            'expected_to_return_at' => fake()->optional()->dateTimeBetween('+1 day', '+1 month'),
        ];
    }

    /**
     * Get the record count of any model.
     *
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    private function getModelRecordCount(string $model): int
    {
        $acceptedModels = ['departments', 'soldiers', 'locations', 'reproductions'];

        throw_if(
            ! in_array($model, $acceptedModels, true),
            new InvalidArgumentException("Invalid model: $model")
        );

        $recordCount = DB::table($model)->count();

        if ($recordCount === 0) {
            logger()->error("No $model found for generating vehicles.");
            throw new RuntimeException("No $model found for generating vehicles.");
        }

        return $recordCount;
    }

    /**
     * Get a random condition.
     */
    private function getRandomCondition(): string
    {
        $randomCondition = random_int(0, 1);

        return VehicleCondition::cases()[$randomCondition]->value;
    }

    /**
     * Get a random status.
     */
    private function getRandomStatus(?string $condition): string
    {
        $randomStatus = random_int(0, 2);
        $status = VehicleStatus::cases()[$randomStatus]->value;

        if ($condition !== null && $condition === VehicleCondition::BAD->value) {
            $status = VehicleStatus::OUT_OF_ORDER->value;
        }

        return $status;
    }
}
