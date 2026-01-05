<?php

declare(strict_types=1);

namespace App\Http\Controllers;

final class VehicleController
{
    public function __construct() {}

    /**
     * Get vehicles page.
     */
    public function index()
    {
        return view('mods.vehicles.index');
    }
}
