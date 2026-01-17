<?php

declare(strict_types=1);

namespace App\Livewire\Mods\Vehicles;

use App\Queries\VehicleQuery;
use App\Traits\VehicleFilterRules;
use DateTimeImmutable;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

final class VehicleTable extends Component
{
    use VehicleFilterRules, WithPagination;

    /** @var ?string department filter. */
    #[Url]
    public ?string $department = null;

    /** @var ?string brand filter. */
    #[Url]
    public ?string $brand = null;

    /** @var ?string number filter. */
    #[Url]
    public ?string $number = null;

    /** @var ?string assigned filter. */
    #[Url]
    public ?string $assigned = null;

    /** @var ?string condition filter. */
    #[Url]
    public ?string $condition = null;

    /** @var ?string location filter. */
    #[Url]
    public ?string $location = null;

    /** @var ?DateTimeImmutable expected_to_return filter. */
    #[Url(as: 'return')]
    public ?DateTimeImmutable $expected_to_return = null;

    /** @var ?string status filter. */
    #[Url]
    public ?string $status = null;

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

        $this->resetPage();

        logger()->info('Updated filters in vehicle-table on vehicle-filter-form-changed event.');
    }

    /**
     * Vehicle table controller.
     */
    public function render(VehicleQuery $vehicleQuery): View
    {
        $vehicles = $vehicleQuery->init()
            ->withAndWhereDepartment($this->department)
            ->withAndWhereSoldier($this->assigned)
            ->withAndWhereLocation($this->location)
            ->withAndWhereReproduction($this->brand)
            ->whereNumber($this->number)
            ->whereCondition($this->condition)
            ->whereStatus($this->status)
            ->paginate(20);

        return view('livewire.mods.vehicles.vehicle-table', [
            'vehicles' => $vehicles,
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
