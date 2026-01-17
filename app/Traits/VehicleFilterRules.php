<?php

declare(strict_types=1);

namespace App\Traits;

use App\Enums\VehicleCondition;
use App\Enums\VehicleStatus;
use Illuminate\Validation\Rule;

trait VehicleFilterRules
{
    /**
     * Get an array of defined rules for vehicle filters.
     */
    public function vehicleFilterRules(): array
    {
        return [
            'department' => 'nullable|string',
            'brand' => 'nullable|string',
            'number' => 'nullable|string',
            'assigned' => 'nullable|string',
            'condition' => [
                'nullable',
                'string',
                Rule::in([
                    VehicleCondition::GOOD->value,
                    VehicleCondition::BAD->value,
                ]),
            ],
            'location' => 'nullable|string',
            'expected_to_return' => 'nullable|date',
            'status' => [
                'nullable',
                'string',
                Rule::in([
                    VehicleStatus::AVAILABLE->value,
                    VehicleStatus::LEFT->value,
                    VehicleStatus::OUT_OF_ORDER->value,
                ]),
            ],
        ];
    }
}
