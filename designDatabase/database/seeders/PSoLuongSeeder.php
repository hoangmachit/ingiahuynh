<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class PSoLuongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 100; $i <= 400; $i++) {
            DB::table('p_so_luong')->insert([
                'count' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
