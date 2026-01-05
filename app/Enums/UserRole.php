<?php

declare(strict_types=1);

namespace App\Enums;

enum UserRole: string
{
    case ADMIN = 'admin';

    /**
     * Get the label of the user role.
     */
    public function label(): string
    {
        return match ($this) {
            self::ADMIN => 'Admin',
        };
    }
}
