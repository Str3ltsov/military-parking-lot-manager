<?php

declare(strict_types=1);

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property-read int $id
 * @property-read string $name
 * @property-read DateTime $created_at
 * @property-read DateTime $updated_at
 */
final class Department extends Model
{
    /** @use HasFactory<\Database\Factories\DepartmentFactory> */
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the vehicles of the department.
     */
    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class);
    }
}
