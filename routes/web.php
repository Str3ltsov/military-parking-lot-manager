<?php

declare(strict_types=1);

use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

// Moderator routes
Route::get('/', [VehicleController::class, 'index'])->name('vehicles.index');
Route::get('/home', fn () => redirect()->route('vehicles.index'));
