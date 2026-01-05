<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property-read int $id
 * @property-read int $brand_id
 * @property-read string $name
 * @property-read Brand|null $brand
 */
final class Reproduction extends Model
{
    /** @use HasFactory<\Database\Factories\ReproductionFactory> */
    use HasFactory;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'brand_id',
        'name',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [];

    /**
     * Get the brand of the reproduction.
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Get the vehicles of the reproduction.
     */
    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class);
    }

    /**
     * Attribute to get brand name with reproduction name.
     */
    public function nameWithBrand(): ?string
    {
        if ($this->brand === null) {
            logger()->error('Missing brand for reproduction: '.$this->id);

            return null;
        }

        return $this->brand->name.' '.$this->name;
    }
}
