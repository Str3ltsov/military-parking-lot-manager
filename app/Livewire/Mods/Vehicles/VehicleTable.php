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
     * @var VehicleService instance.
     */
    private VehicleService $vehicleService;

    /**
     * Vehicle table constructor.
     */
    public function mount(VehicleService $vehicleService): void
    {
        $this->vehicleService = $vehicleService;
    }

    /**
     * Vehicle table controller.
     */
    public function render(): View
    {
        $vehicles = $this->vehicleService->getPaginatedVehicles(20);

        return view('livewire.mods.vehicles.vehicle-table', [
            'vehicles' => $vehicles,
        ]);
    }
}
