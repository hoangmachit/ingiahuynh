<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class PThoiGianSeeder extends Seeder
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
                "name" => "Trong ngày",
                "percent" => 150,
            ],
            [
                "name" => "2 ngày",
                "percent" => 100,
            ],
            [
                "name" => "5 ngày",
                "percent" => 98,
            ],
            [
                "name" => "7 ngày",
                "percent" => 96,
            ],
            [
                "name" => "1 Tháng",
                "percent" => 80,
            ],
        ];
        foreach ($data as $key => $item) {
            $newData = $item;
            $newData['created_at'] = now();
            $newData['updated_at'] = now();
            DB::table('p_thoi_gian')->insert($newData);
        }
    }
}
