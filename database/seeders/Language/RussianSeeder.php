<?php

namespace Database\Seeders\Language;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RussianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Language::factory()->create([
            'id' => 'ru',
            'name' => 'Русский',
            'active' => true,
            'default' => true,
        ]);
    }
}
