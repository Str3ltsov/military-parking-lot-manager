<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Traits\VehicleFilterRules;
use Illuminate\Foundation\Http\FormRequest;

final class FilterVehicleRequest extends FormRequest
{
    use VehicleFilterRules;

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
        return $this->vehicleFilterRules();
    }
}
