<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Vehicle;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class VehicleService
{
    /**
     * Get an object of vehicles with pagination.
     */
    public function getPaginatedVehicles(int $perPage): LengthAwarePaginator
    {
        return Vehicle::query()
            ->with([
                'department:id,name',
                'soldier.rank',
                'soldier:id,first_name,last_name,rank_id',
                'location:id,name',
                'reproduction.brand',
                'reproduction:id,name,brand_id',
            ])
            ->paginate($perPage);
    }
}
