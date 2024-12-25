<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Meme;

class MemeSeeder extends Seeder
{
    public function run()
    {
        Meme::create([
            'title' => 'First Meme',
            'image_url' => 'https://example.com/image1.jpg',
        ]);

        Meme::create([
            'title' => 'Second Meme',
            'image_url' => 'https://example.com/image2.jpg',
        ]);
    }
} 