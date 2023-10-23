<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class PChatLieuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            "DECAL ĐẾ XANH",
            "DECAL GIẤY OJLABEL",
            "DECAL NHỰA AMAZON",
            "DECAL TRONG AMAZON",
            "DECAL KRAFT",
            "DECAL FASHION",
            "DECAL BẠC MỜ",
            "DECAL BẠC BÓNG ",
            "DECAL 7 MÀU",
            "DECAL TRONG KHÔNG TRÓC",
            "DECAL BẾ DẺO ĐẾ TRẮNG",
            "DECAL BỂ GIÒN ĐẾ AMAZON",
            "DECAL TỔ ONG",
        ];
        foreach ($data as $key => $item) {
            DB::table('p_chat_lieu')->insert([
                'name' => $item,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
