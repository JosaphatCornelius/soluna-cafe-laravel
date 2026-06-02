<?php

namespace Database\Seeders;

use App\Models\Content;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUser = User::where('email', 'admin@solunacafe.local')->first();

        if (!$adminUser) {
            return;
        }

        // Create default content pages
        Content::create([
            'slug' => 'home',
            'title' => 'Home',
            'description' => 'Welcome to Soluna Cafe. A place for great coffee and community.',
            'created_by' => $adminUser->id,
            'updated_by' => $adminUser->id,
        ]);

        Content::create([
            'slug' => 'about-us',
            'title' => 'About Us',
            'description' => 'Learn about our cafe, our mission, and our commitment to quality.',
            'created_by' => $adminUser->id,
            'updated_by' => $adminUser->id,
        ]);

        Content::create([
            'slug' => 'contact-us',
            'title' => 'Contact Us',
            'description' => 'Get in touch with us. We love hearing from our customers.',
            'created_by' => $adminUser->id,
            'updated_by' => $adminUser->id,
        ]);
    }
}
