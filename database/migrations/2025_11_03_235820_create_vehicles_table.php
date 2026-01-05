<?php

declare(strict_types=1);

use App\Enums\VehicleCondition;
use App\Enums\VehicleStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained('departments');
            $table->foreignId('soldier_id')->constrained('soldiers');
            $table->foreignId('location_id')->constrained('locations');
            $table->foreignId('reproduction_id')->constrained('reproductions');
            $table->string('plate_number', 6)->unique();
            $table->string('condition', 15)->default(VehicleCondition::GOOD->value);
            $table->string('status', 15)->default(VehicleStatus::AVAILABLE->value);
            $table->tinyText('notes_problems')->nullable();
            $table->dateTime('expected_to_return_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
