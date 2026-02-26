<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            'Sportief', 'Familie', 'Elektrisch', 'Compact', 'SUV',
            'Luxe', 'Youngtimer', 'Oldtimer', 'Pickup', 'Stationwagen',
            'Cabrio', 'Hybride', 'Diesel', 'Benzine', 'Automaat',
            'Handgeschakeld', '4x4', 'Bedrijfswagen', 'Budget', 'Premium'
        ];

        foreach ($tags as $tag) {
            Tag::create(['name' => $tag]);
        }
    }
}
