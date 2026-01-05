<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

final class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            [
                'name' => 'I UB',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'II UB',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'III UB',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'SB',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'PK',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
