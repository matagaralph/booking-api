<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $user = User::create([
            'name' => 'Administrator',
            'email' => 'admin@booking.com',
            'password' => bcrypt('TestPassword'),
            'email_verified_at' => now(),
        ]);

        $user->assignRole('Administrator');
    }
}
