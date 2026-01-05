<?php

declare(strict_types=1);

namespace App\Enums;

enum VehicleStatus: string
{
    case AVAILABLE = 'available';
    case LEFT = 'left';
    case OUT_OF_ORDER = 'out_of_order';

    /**
     * Get the label of the vehicle status.
     */
    public function label(): string
    {
        return match ($this) {
            self::AVAILABLE => 'Available',
            self::LEFT => 'Left',
            self::OUT_OF_ORDER => 'Out of order',
        };
    }
}
