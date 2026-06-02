<?php

namespace Database\Seeders;

use App\Models\Recommendation;
use App\Models\User;
use Illuminate\Database\Seeder;

class RecommendationSeeder extends Seeder
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

        $items = [
            ['name' => 'Avocado Coffee', 'image_url' => 'images/avocado.jpg'],
            ['name' => 'Coffee Mocktail', 'image_url' => 'images/moctail.jpg'],
            ['name' => 'Souffle Pancake', 'image_url' => 'images/soffle.jpg'],
        ];

        foreach ($items as $item) {
            Recommendation::create([
                'name' => $item['name'],
                'image_url' => $item['image_url'],
                'created_by' => $adminUser->id,
                'updated_by' => $adminUser->id,
            ]);
        }
    }
}
