<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Enums\VehicleCondition;
use App\Enums\VehicleStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class FilterVehicleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'department' => 'nullable|string|exists:departments,name',
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
