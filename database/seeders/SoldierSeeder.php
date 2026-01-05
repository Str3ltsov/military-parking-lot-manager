<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Soldier;
use Illuminate\Database\Seeder;

final class SoldierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Soldier::factory()->count(50)->create();
    }
}
