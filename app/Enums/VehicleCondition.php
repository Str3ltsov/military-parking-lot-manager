<?php

declare(strict_types=1);

namespace App\Enums;

enum VehicleCondition: string
{
    case GOOD = 'good';
    case BAD = 'bad';

    /**
     * Get the label of the vehicle condition.
     */
    public function label(): string
    {
        return match ($this) {
            self::GOOD => 'Good',
            self::BAD => 'Bad',
        };
    }
}
