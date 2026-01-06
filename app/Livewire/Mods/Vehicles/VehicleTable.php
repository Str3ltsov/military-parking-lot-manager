<?php

declare(strict_types=1);

namespace App\Livewire\Mods\Vehicles;

use App\Services\VehicleService;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

final class VehicleTable extends Component
{
    use WithPagination;

    /**
     * Vehicle table controller.
     */
    public function render(VehicleService $vehicleService): View
    {
        $vehicles = $vehicleService->getPaginatedVehicles(20);

        return view('livewire.mods.vehicles.vehicle-table', [
            'vehicles' => $vehicles,
        ]);
    }
}
