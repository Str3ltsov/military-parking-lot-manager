<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

final class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('locations')->insert([
            ['name' => 'Vehicle Park'],
            ['name' => 'Headquarters'],
            ['name' => 'Service'],
        ]);

        Location::factory()->count(20)->create();
    }
}
