<?php

declare(strict_types=1);

namespace App\Dtos;

use App\Http\Requests\FilterVehicleRequest;
use DateTimeImmutable;

final readonly class VehicleFilterFormDto
{
    /**
     * VehicleFilterFormDto constructor.
     */
    public function __construct(
        public ?string $department = null,
        public ?string $brand = null,
        public ?string $number = null,
        public ?string $assigned = null,
        public ?string $condition = null,
        public ?string $location = null,
        public ?DateTimeImmutable $expected_to_return = null,
        public ?string $status = null,
    ) {}

    /**
     * Create VehicleFilterFormDto from array data.
     */
    public static function fromArray(array $data): self
    {
        return new self(
            department: $data['department'] ?? null,
            brand: $data['brand'] ?? null,
            number: $data['number'] ?? null,
            assigned: $data['assigned'] ?? null,
            condition: $data['condition'] ?? null,
            location: $data['location'] ?? null,
            expected_to_return: $data['expected_to_return'] ?? null,
            status: $data['status'] ?? null,
        );
    }

    /**
     * Create VehicleFilterFormDto from validated FilterVehicleRequest request.
     */
    public static function fromRequest(FilterVehicleRequest $request): self
    {
        return self::fromArray($request->validated());
    }

    /**
     * Convert VehicleFilterFormDto to array.
     */
    public function toArray(): array
    {
        return [
            'department' => $this->department,
            'brand' => $this->brand,
            'number' => $this->number,
            'assigned' => $this->assigned,
            'condition' => $this->condition,
            'location' => $this->location,
            'expected_to_return' => $this->expected_to_return,
            'status' => $this->status,
        ];
    }
}
