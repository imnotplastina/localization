<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\Language\DeutschSeeder;
use Database\Seeders\Language\EnglishSeeder;
use Database\Seeders\Language\ItalianSeeder;
use Database\Seeders\Language\RussianSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            EnglishSeeder::class,
            DeutschSeeder::class,
            ItalianSeeder::class,
            RussianSeeder::class,
        ]);
    }
}
