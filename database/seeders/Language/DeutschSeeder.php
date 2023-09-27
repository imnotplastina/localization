<?php

namespace Database\Seeders\Language;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeutschSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Language::factory()->create([
            'id' => 'de',
            'name' => 'Deutsch',
        ]);
    }
}
