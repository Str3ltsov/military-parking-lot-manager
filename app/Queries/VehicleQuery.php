<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Vehicle;
use Exception;
use Illuminate\Database\Eloquent\Builder;

final class VehicleQuery
{
    /** @var object vehicles */
    private object $vehicles;

    /**
     * Initialize VehicleQuery.
     */
    public function init(): self
    {
        $this->vehicles = Vehicle::query();

        return $this;
    }

    /**
     * Get VehicleQuery.
     */
    public function get(): object
    {
        return $this->vehicles->get();
    }

    /**
     * Get VehicleQuery paginated.
     */
    public function paginate(int $perPage): object
    {
        if ($perPage <= 0) {
            throw new Exception('paginate method can only use 1 or more records per page in VehicleQuery class');
        }

        return $this->vehicles->paginate($perPage);
    }

    /**
     * Build VehicleQuery with and where department.
     */
    public function withAndWhereDepartment(?string $department = null): self
    {
        $this->vehicles = $this->vehicles->with('department:id,name');

        if ($department !== null && $department !== '') {
            $this->vehicles = $this->vehicles->whereHas('department', function (Builder $query) use ($department): void {
                $query->where('name', 'LIKE', "%{$department}%");
            });
        }

        return $this;
    }

    /**
     * Build VehicleQuery with and where soldier.
     */
    public function withAndWhereSoldier(?string $soldier = null): self
    {
        $this->vehicles = $this->vehicles->with([
            'soldier.rank',
            'soldier:id,first_name,last_name,rank_id',
        ]);

        if ($soldier !== null && $soldier !== '') {
            $this->vehicles = $this->vehicles->whereHas('soldier', function (Builder $query) use ($soldier): void {
                foreach (array_filter(explode(' ', trim($soldier))) as $term) {
                    $query->where(function (Builder $termQuery) use ($term): void {
                        $termQuery->where('first_name', 'LIKE', "%{$term}%")
                            ->orWhere('last_name', 'LIKE', "%{$term}%")
                            ->orWhereHas('rank', function (Builder $rankQuery) use ($term): void {
                                $rankQuery->where('short_title', 'LIKE', "%{$term}%");
                            });
                    });
                }
            });
        }

        return $this;
    }

    /**
     * Build VehicleQuery with and where location.
     */
    public function withAndWhereLocation(?string $location = null): self
    {
        $this->vehicles = $this->vehicles->with('location:id,name');

        if ($location !== null && $location !== '') {
            $this->vehicles = $this->vehicles->whereHas('location', function (Builder $query) use ($location): void {
                $query->where('name', 'LIKE', "%{$location}%");
            });
        }

        return $this;
    }

    /**
     * Build VehicleQuery with and where reproduction.
     */
    public function withAndWhereReproduction(?string $reproduction = null): self
    {
        $this->vehicles = $this->vehicles->with([
            'reproduction.brand',
            'reproduction:id,name,brand_id',
        ]);

        if ($reproduction !== null && $reproduction !== '') {
            $this->vehicles = $this->vehicles->whereHas('reproduction', function (Builder $query) use ($reproduction): void {
                $query->where(function (Builder $subQuery) use ($reproduction): void {
                    $subQuery->where('name', 'LIKE', "%{$reproduction}%")
                        ->orWhereHas('brand', function (Builder $brandQuery) use ($reproduction): void {
                            $brandQuery->where('name', 'LIKE', "%{$reproduction}%");
                        });
                });
            });
        }

        return $this;
    }

    /**
     * Build VehicleQuery where number.
     */
    public function whereNumber(?string $number = null): self
    {
        if ($number !== null && $number !== '') {
            $this->vehicles = $this->vehicles->where('plate_number', 'LIKE', "%{$number}%");

            return $this;
        }

        return $this;
    }

    /**
     * Build VehicleQuery where condition.
     */
    public function whereCondition(?string $condition = null): self
    {
        if ($condition !== null && $condition !== '') {
            $this->vehicles = $this->vehicles->where('condition', $condition);

            return $this;
        }

        return $this;
    }

    /**
     * Build VehicleQuery where status.
     */
    public function whereStatus(?string $status = null): self
    {
        if ($status !== null && $status !== '') {
            $this->vehicles = $this->vehicles->where('status', $status);

            return $this;
        }

        return $this;
    }
}
