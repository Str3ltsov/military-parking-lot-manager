<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property-read int $id
 * @property-read string $title
 * @property-read string $short_title
 * @property-read string $grade
 */
final class Rank extends Model
{
    /** @use HasFactory<\Database\Factories\RankFactory> */
    use HasFactory;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'short_title',
        'grade',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [];

    /**
     * Get the soldiers of the rank.
     */
    public function soldiers(): HasMany
    {
        return $this->hasMany(Soldier::class);
    }
}
