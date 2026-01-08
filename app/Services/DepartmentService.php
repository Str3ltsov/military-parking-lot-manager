<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Department;
use Illuminate\Database\Eloquent\Collection;

final class DepartmentService
{
    /**
     * Get all departments with id and name attributes.
     */
    public function getAllDepartments(): Collection
    {
        return Department::query()->select('id', 'name')->get();
    }
}
