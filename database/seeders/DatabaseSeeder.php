<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DepartmentSeeder::class,
            RankSeeder::class,
            SoldierSeeder::class,
            LocationSeeder::class,
            BrandSeeder::class,
            ReproductionSeeder::class,
            VehicleSeeder::class,
        ]);
    }
}
