<?php

declare(strict_types=1);

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
        Schema::create('ranks', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50)->unique();
            $table->string('short_title', 15)->unique();
            $table->string('grade', 4);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ranks');
    }
};
