<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quote;

class QuoteSeeder extends Seeder
{
    public function run()
    {
        Quote::create([
            'author' => 'Author One',
            'quote' => 'This is the first quote.',
        ]);

        Quote::create([
            'author' => 'Author Two',
            'quote' => 'This is the second quote.',
        ]);
    }
} 