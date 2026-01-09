<?php

declare(strict_types=1);

namespace App\Livewire\Mods\Vehicles;

use App\Enums\VehicleCondition;
use App\Enums\VehicleStatus;
use App\Services\DepartmentService;
use DateTimeImmutable;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;

final class VehicleFilterForm extends Component
{
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

        logger()->info('Dispatched vehicle-filter-form-changed event from vehicle-filter-form component.');
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
