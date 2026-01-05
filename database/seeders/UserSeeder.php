<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\UserRole;
use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

final class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@mplm.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role' => UserRole::ADMIN->value,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Backup Admin',
                'email' => 'backup_admin@mplm.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role' => UserRole::ADMIN->value,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
