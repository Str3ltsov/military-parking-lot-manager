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
final class Brand extends Model
{
    /** @use HasFactory<\Database\Factories\BrandFactory> */
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
     * Get the reproductions of the brand.
     */
    public function reproductions(): HasMany
    {
        return $this->hasMany(Reproduction::class);
    }
}
