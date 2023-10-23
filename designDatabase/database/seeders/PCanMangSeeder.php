<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class PCanMangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Không có cấn màng',
                'percent' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bóng mờ',
                'percent' => 300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bóng mờ nhẹ',
                'percent' => 500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('p_can_mang')->insert($data);
    }
}
