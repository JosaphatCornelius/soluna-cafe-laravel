<?php

namespace Database\Seeders;

use App\Models\Content;
use App\Models\User;
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

        $audit = [
            'created_by' => $adminUser->id,
            'updated_by' => $adminUser->id,
        ];

        $records = [
            // Drives the homepage "Our Story" section (welcome.blade.php).
            [
                'slug' => 'home',
                'title' => 'Our Story',
                'description' => 'The Heritage of Soluna Cafe Our story began on October 24th, 2022, born from a deep-rooted passion for authentic flavors and the art of hospitality. What started as a vision to create the perfect community getaway has evolved into Soluna Cafe, a place where every corner tells a story and every guest is treated like family. Since our first day, we have remained committed to the idea that a cafe should be more than just a place to eat—it should be an experience.',
            ],

            // The three About Us sections (aboutus.blade.php).
            [
                'slug' => 'about-story',
                'title' => '"Didirikan pada 12 Desember 2012, Soluna Cafe lahir dari hasrat sederhana akan kopi yang luar biasa dan komunitas."',
                'description' => 'Kisah kami dimulai pada 12 Desember 2012, lahir dari hasrat yang mendalam akan cita rasa otentik dan seni keramahan. Apa yang dimulai sebagai visi untuk menciptakan tempat peristirahatan komunitas yang sempurna telah berkembang menjadi Soluna Cafe, tempat di mana setiap sudut menceritakan sebuah kisah dan setiap tamu diperlakukan seperti keluarga. Sejak hari pertama kami, kami tetap berkomitmen pada gagasan bahwa sebuah kafe seharusnya lebih dari sekadar tempat makan—itu seharusnya menjadi sebuah pengalaman.',
            ],
            [
                'slug' => 'about-chef',
                'title' => 'Dedikasi, Pengalaman, dan Cita Rasa High-Class.',
                'description' => 'Dengan pengalaman lebih dari 67 tahun di industri kuliner skala internasional, Chef Kevin Kristianto membawa keahlian mendalam dan filosofi memasak yang autentik ke dapur kami. Sebelum memimpin tim kuliner kami, beliau telah mengasah bakatnya di Cafe Batavia. Rekam jejak ini membentuk standar kerja beliau yang tanpa kompromi dalam hal rasa, kebersihan, dan estetika presentasi piring.',
            ],
            [
                'slug' => 'about-awards',
                'title' => 'Awards yang berhasil didapatkan:',
                'description' => "Salon Cullinaire 2019 by ACP - FHI\nTea Cocktail - Gold Medal\nBeef Challange - Silver Medal\nPan Fried Noodle - Diploma Award\nUS Potatoes - Diploma Award",
            ],

            [
                'slug' => 'contact-us',
                'title' => 'Contact Us',
                'description' => 'Get in touch with us. We love hearing from our customers.',
            ],
        ];

        foreach ($records as $record) {
            Content::updateOrCreate(
                ['slug' => $record['slug']],
                array_merge($record, $audit)
            );
        }

        // Remove the previous generic placeholder now superseded by the about-* records.
        Content::where('slug', 'about-us')->delete();
    }
}
