<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create the admin user
        $user = User::create([
            'name' => 'J4C Group',
            'email' => 'info@jett4.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('1234567890'),
            'created_by' => 1,
            'created_at' => Carbon::now(),
        ]);
    }
}
