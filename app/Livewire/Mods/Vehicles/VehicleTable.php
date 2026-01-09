<?php

declare(strict_types=1);

namespace App\Livewire\Mods\Vehicles;

use App\Enums\VehicleCondition;
use App\Enums\VehicleStatus;
use App\Services\VehicleService;
use DateTimeImmutable;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

final class VehicleTable extends Component
{
    use WithPagination;

    /** @var ?string department filter. */
    public ?string $department;

    /** @var ?string brand filter. */
    public ?string $brand;

    /** @var ?string number filter. */
    public ?string $number;

    /** @var ?string assigned filter. */
    public ?string $assigned;

    /** @var ?string condition filter. */
    public ?string $condition;

    /** @var ?string location filter. */
    public ?string $location;

    /** @var ?DateTimeImmutable expected_to_return filter. */
    public ?DateTimeImmutable $expected_to_return;

    /** @var ?string status filter. */
    public ?string $status;

    /**
     * Update filters on vehicle-filter-form-changed event.
     */
    #[On('vehicle-filter-form-changed')]
    public function updateFilters(
        ?string $department,
        ?string $brand,
        ?string $number,
        ?string $assigned,
        ?string $condition,
        ?string $location,
        ?DateTimeImmutable $expected_to_return,
        ?string $status
    ): void {
        $this->department = $department;
        $this->brand = $brand;
        $this->number = $number;
        $this->assigned = $assigned;
        $this->condition = $condition;
        $this->location = $location;
        $this->expected_to_return = $expected_to_return;
        $this->status = $status;

        logger()->info('Updated filters on vehicle-filter-form-changed event.');
    }

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

    /**
     * Component variable rules.
     */
    protected function rules(): array
    {
        return [
            'department' => 'nullable|string',
            'brand' => 'nullable|string',
            'number' => 'nullable|string',
            'assigned' => 'nullable|string',
            'condition' => [
                'nullable',
                'string',
                Rule::in([
                    VehicleCondition::GOOD->value,
                    VehicleCondition::BAD->value,
                ]),
            ],
            'location' => 'nullable|string',
            'expected_to_return' => 'nullable|date',
            'status' => [
                'nullable',
                'string',
                Rule::in([
                    VehicleStatus::AVAILABLE->value,
                    VehicleStatus::LEFT->value,
                    VehicleStatus::OUT_OF_ORDER->value,
                ]),
            ],
        ];
    }
}
