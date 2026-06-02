<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@solunacafe.local',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Create editor user
        User::create([
            'name' => 'Editor',
            'email' => 'editor@solunacafe.local',
            'password' => bcrypt('password'),
            'role' => 'editor',
            'email_verified_at' => now(),
        ]);
    }
}
