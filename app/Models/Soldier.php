<?php

declare(strict_types=1);

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property-read int $id
 * @property-read int $rank_id
 * @property-read string $first_name
 * @property-read string $last_name
 * @property-read string $phone_number
 * @property-read DateTime $created_at
 * @property-read DateTime $updated_at
 * @property-read Rank|null $rank
 */
final class Soldier extends Model
{
    /** @use HasFactory<\Database\Factories\SoldierFactory> */
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'rank_id',
        'first_name',
        'last_name',
        'phone_number',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the rank of the soldier.
     */
    public function rank(): BelongsTo
    {
        return $this->belongsTo(Rank::class, 'rank_id', 'id');
    }

    /**
     * Get the vehicles of the soldier.
     */
    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class);
    }

    /**
     * Attribute to get short rank title with soldier's fullname.
     */
    public function fullNameWithRank(): ?string
    {
        if ($this->rank === null) {
            logger()->error('Missing rank for soldier: '.$this->id);

            return null;
        }

        return $this->rank->short_title.' '.$this->first_name.' '.$this->last_name;
    }
}
