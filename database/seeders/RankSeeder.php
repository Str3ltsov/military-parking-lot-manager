<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

final class RankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ranks')->insert([
            [
                'title' => 'Junior Private',
                'short_title' => 'Jr. Pr.',
                'grade' => 'OR-1',
            ],
            [
                'title' => 'Private',
                'short_title' => 'Pr.',
                'grade' => 'OR-2',
            ],
            [
                'title' => 'Senior Private',
                'short_title' => 'Sr. Pr.',
                'grade' => 'OR-3',
            ],
            [
                'title' => 'Corporal',
                'short_title' => 'Cpl.',
                'grade' => 'OR-4',
            ],
            [
                'title' => 'Sergeant',
                'short_title' => 'Sgt.',
                'grade' => 'OR-5',
            ],
            [
                'title' => 'Sergeant Specialist',
                'short_title' => 'Sgt. Spc.',
                'grade' => 'OR-5',
            ],
            [
                'title' => 'Senior Sergeant',
                'short_title' => 'Sr. Sgt.',
                'grade' => 'OR-6',
            ],
            [
                'title' => 'Senior Sergeant Specialist',
                'short_title' => 'Sr. Sgt. Spc.',
                'grade' => 'OR-6',
            ],
            [
                'title' => 'Staff Sergeant',
                'short_title' => 'Sf. Sgt.',
                'grade' => 'OR-7',
            ],
            [
                'title' => 'Staff Sergeant Specialist',
                'short_title' => 'Sf. Sgt. Spc.',
                'grade' => 'OR-7',
            ],
            [
                'title' => 'First Sergeant',
                'short_title' => '1Sgt.',
                'grade' => 'OR-8',
            ],
            [
                'title' => 'Sergeant Major',
                'short_title' => 'Sgt. Maj.',
                'grade' => 'OR-9',
            ],
            [
                'title' => 'Lieutenant',
                'short_title' => 'Lt.',
                'grade' => 'OF-1',
            ],
            [
                'title' => 'Senior Lieutenant',
                'short_title' => 'Sr. Lt.',
                'grade' => 'OF-1',
            ],
            [
                'title' => 'Captain',
                'short_title' => 'Cpt.',
                'grade' => 'OF-2',
            ],
            [
                'title' => 'Major',
                'short_title' => 'Maj.',
                'grade' => 'OF-3',
            ],
            [
                'title' => 'Lieutenant Colonel',
                'short_title' => 'Lt. Col.',
                'grade' => 'OF-4',
            ],
            [
                'title' => 'Colonel',
                'short_title' => 'Col.',
                'grade' => 'OF-5',
            ],
            [
                'title' => 'Brigadier General',
                'short_title' => 'Brig. Gen.',
                'grade' => 'OF-6',
            ],
            [
                'title' => 'Major General',
                'short_title' => 'Maj. Gen.',
                'grade' => 'OF-7',
            ],
            [
                'title' => 'Lieutenant General',
                'short_title' => 'Lt. Gen.',
                'grade' => 'OF-8',
            ],
            [
                'title' => 'General',
                'short_title' => 'Gen.',
                'grade' => 'OF-9',
            ],
        ]);
    }
}
