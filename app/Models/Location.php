<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property-read int $id
 * @property-read string $name
 */
final class Location extends Model
{
    /** @use HasFactory<\Database\Factories\LocationFactory> */
    use HasFactory;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [];

    /**
     * Get the vehicles of the location.
     */
    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class);
    }
}
