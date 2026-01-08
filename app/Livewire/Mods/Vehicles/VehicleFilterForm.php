<?php

declare(strict_types=1);

namespace App\Livewire\Mods\Vehicles;

use App\Enums\VehicleCondition;
use App\Enums\VehicleStatus;
use App\Services\DepartmentService;
use DateTimeImmutable;
use Illuminate\Contracts\View\View;
use Livewire\Component;

final class VehicleFilterForm extends Component
{
    /** @var ?string department filter query parameter. */
    public ?string $department;

    /** @var ?string brand filter query parameter. */
    public ?string $brand;

    /** @var ?string number filter query parameter. */
    public ?string $number;

    /** @var ?string assigned filter query parameter. */
    public ?string $assigned;

    /** @var ?VehicleCondition condition filter query parameter. */
    public ?VehicleCondition $condition;

    /** @var ?string location filter query parameter. */
    public ?string $location;

    /** @var ?DateTimeImmutable expected_to_return filter query parameter. */
    public ?DateTimeImmutable $expected_to_return;

    /** @var ?VehicleStatus status filter query parameter. */
    public ?VehicleStatus $status;

    /**
     * Vehicle filter form controller.
     */
    public function render(DepartmentService $departmentService): View
    {
        $departments = $departmentService->getAllDepartments();
        $conditions = VehicleCondition::cases();
        $statuses = VehicleStatus::cases();

        return view('livewire.mods.vehicles.vehicle-filter-form')
            ->with([
                'departments' => $departments,
                'conditions' => $conditions,
                'statuses' => $statuses,
            ]);
    }
}
