<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PMatInSeeder::class,
            PKhoInSeeder::class,
            PThoiGianSeeder::class,
            PCanMangSeeder::class,
            PQuyCachSeeder::class,
            PSoLuongSeeder::class,
            PChatLieuSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
