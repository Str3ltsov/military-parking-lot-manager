<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

final class VehicleController
{
    /**
     * Get vehicles page.
     */
    public function index(): View
    {
        return view('mods.vehicles.index');
    }
}
