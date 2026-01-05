<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\VehicleCondition;
use App\Enums\VehicleStatus;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property-read int $id
 * @property-read int $department_id
 * @property-read int $soldier_id
 * @property-read int $location_id
 * @property-read int $reproduction_id
 * @property-read string $plate_number
 * @property-read string $condition
 * @property-read string $status
 * @property-read string|null $notes_problems
 * @property-read DateTime $expected_to_return_at
 * @property-read DateTime $created_at
 * @property-read DateTime $updated_at
 * @property-read Department|null $department
 * @property-read Soldier|null $soldier
 * @property-read Location|null $location
 * @property-read Reproduction|null $reproduction
 */
final class Vehicle extends Model
{
    /** @use HasFactory<\Database\Factories\VehicleFactory> */
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'department_id',
        'soldier_id',
        'location_id',
        'reproduction_id',
        'plate_number',
        'condition',
        'status',
        'notes_problems',
        'expected_to_return_at',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'condition' => VehicleCondition::class,
        'status' => VehicleStatus::class,
        'expected_to_return_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the department of the vehicle.
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Get the soldier of the vehicle.
     */
    public function soldier(): BelongsTo
    {
        return $this->belongsTo(Soldier::class);
    }

    /**
     * Get the location of the vehicle.
     */
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * Get the reproduction of the vehicle.
     */
    public function reproduction(): BelongsTo
    {
        return $this->belongsTo(Reproduction::class);
    }
}
