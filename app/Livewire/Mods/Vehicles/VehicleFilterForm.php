<?php

declare(strict_types=1);

namespace App\Livewire\Mods\Vehicles;

use App\Enums\VehicleCondition;
use App\Enums\VehicleStatus;
use App\Services\DepartmentService;
use App\Traits\VehicleFilterRules;
use DateTimeImmutable;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Livewire\Attributes\Url;
use Livewire\Component;

final class VehicleFilterForm extends Component
{
    use VehicleFilterRules;

    /** @var ?string department filter query parameter. */
    #[Url]
    public ?string $department = null;

    /** @var ?string brand filter query parameter. */
    #[Url]
    public ?string $brand = null;

    /** @var ?string number filter query parameter. */
    #[Url]
    public ?string $number = null;

    /** @var ?string assigned filter query parameter. */
    #[Url]
    public ?string $assigned = null;

    /** @var ?string condition filter query parameter. */
    #[Url]
    public ?string $condition = null;

    /** @var ?string location filter query parameter. */
    #[Url]
    public ?string $location = null;

    /** @var ?DateTimeImmutable expected_to_return filter query parameter. */
    #[Url(as: 'return')]
    public ?DateTimeImmutable $expected_to_return = null;

    /** @var ?string status filter query parameter. */
    #[Url]
    public ?string $status = null;

    /**
     * Dispatch to vehicle-filter-form component.
     */
    public function dispatchToVehicleTable(): void
    {
        $this->validate();
        $this->dispatch(
            'vehicle-filter-form-changed',
            department: $this->department,
            brand: $this->brand,
            number: $this->number,
            assigned: $this->assigned,
            condition: $this->condition,
            location: $this->location,
            expected_to_return: $this->expected_to_return,
            status: $this->status,
        )
            ->to(VehicleTable::class);

        logger()->info('Dispatched vehicle-filter-form-changed event from vehicle-filter-form to vehicle-table.');
    }

    /**
     * Dispatch event when any filter property changes.
     */
    public function updated(string $property): void
    {
        $filterProperties = [
            'department',
            'brand',
            'number',
            'assigned',
            'condition',
            'location',
            'expected_to_return',
            'status',
        ];

        // Normalize empty strings to null immediately.
        if (in_array($property, $filterProperties, true)) {
            $value = $this->{$property};

            if (is_string($value) && $value === '') {
                $this->{$property} = null;
            }

            $this->dispatchToVehicleTable();
        }
    }

    /**
     * Clears filter query parameters.
     */
    public function clearFilters(): void
    {
        $this->department = null;
        $this->brand = null;
        $this->number = null;
        $this->assigned = null;
        $this->condition = null;
        $this->location = null;
        $this->expected_to_return = null;
        $this->status = null;

        $this->dispatchToVehicleTable();

        logger()->info('Cleared filters in vehicle vehicle-filter-form.');
    }

    /**
     * Vehicle filter form controller.
     */
    public function render(DepartmentService $departmentService): View|RedirectResponse
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

    /**
     * Component variable rules.
     */
    protected function rules(): array
    {
        return $this->vehicleFilterRules();
    }
}
