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

        // The "home" record drives the homepage "Our Story" section (welcome.blade.php).
        Content::create([
            'slug' => 'home',
            'title' => 'Our Story',
            'description' => 'The Heritage of Soluna Cafe Our story began on October 24th, 2022, born from a deep-rooted passion for authentic flavors and the art of hospitality. What started as a vision to create the perfect community getaway has evolved into Soluna Cafe, a place where every corner tells a story and every guest is treated like family. Since our first day, we have remained committed to the idea that a cafe should be more than just a place to eat—it should be an experience.',
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
