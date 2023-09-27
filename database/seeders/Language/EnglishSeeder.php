<?php

namespace Database\Seeders\Language;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnglishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Language::factory()->create([
            'id' => 'en',
            'name' => 'English',
            'active' => true,
            'fallback' => true,
        ]);
    }
}
