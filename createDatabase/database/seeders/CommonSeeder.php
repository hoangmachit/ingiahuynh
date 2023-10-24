<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class CommonSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createCanMang();
        $this->createChatLieu();
        $this->createKhoIn();
        $this->createMatIn();
        $this->createQuyCach();
        $this->createSoLuong();
        $this->createThoiGian();
    }
    private function createQuyCach()
    {
        $data = [
            [
                'name' => 'Bế demi',
                'point' => 1000,
            ],
            [
                'name' => 'Bế trời',
                'point' => 1500,
            ],
        ];
        DB::table('product_quy_cachs')->insert($data);
    }
    private function createThoiGian()
    {
        $data = [
            [
                'name' => 'Trong ngày',
                'percent' => 150,
            ],
            [
                'name' => '2 ngày',
                'percent' => 100,
            ],
            [
                'name' => '5 ngày',
                'percent' => 98,
            ],
            [
                'name' => '7 ngày',
                'percent' => 96,
            ],
            [
                'name' => '1 Tháng',
                'percent' => 80,
            ],
        ];
        DB::table('product_thoi_gians')->insert($data);
    }
    private function createMatIn()
    {
        $data = [
            [
                'name' => '1 mặt',
                'percent' => 1300,
            ],
            [
                'name' => '2 mặt',
                'percent' => 1300,
            ],
            [
                'name' => '3 mặt',
                'percent' => 1300,
            ],
        ];
        DB::table('product_mat_ins')->insert($data);
    }
    private function createSoLuong()
    {
        $data = [
            [
                'name' => '50',
                'count' => 50,
            ],
            [
                'name' => '100',
                'count' => 100,
            ],
            [
                'name' => '150',
                'count' => 150,
            ],
            [
                'name' => '200',
                'count' => 200,
            ],
            [
                'name' => '250',
                'count' => 250,
            ],
            [
                'name' => '300',
                'count' => 300,
            ],
            [
                'name' => '350',
                'count' => 350,
            ],
            [
                'name' => '400',
                'count' => 400,
            ],
        ];
        DB::table('product_so_luongs')->insert($data);
    }
    private function createKhoIn()
    {
        $data = [
            [
                'left' => 33,
                'right' => 35,
            ],
            [
                'left' => 33,
                'right' => 48,
            ],
            [
                'left' => 30,
                'right' => 35,
            ],
            [
                'left' => 25,
                'right' => 35,
            ],
            [
                'left' => 33,
                'right' => 35,
            ],
            [
                'left' => 37,
                'right' => 40,
            ],
            [
                'left' => 33,
                'right' => 40,
            ],
        ];
        DB::table('product_kho_ins')->insert($data);
    }
    private function createChatLieu()
    {
        $data = ['DECAL ĐẾ XANH', 'DECAL GIẤY OJLABEL', 'DECAL NHỰA AMAZON', 'DECAL TRONG AMAZON', 'DECAL KRAFT', 'DECAL FASHION', 'DECAL BẠC MỜ', 'DECAL BẠC BÓNG', 'DECAL 7 MÀU', 'DECAL TRONG KHÔNG TRÓC', 'DECAL BẾ DẺO ĐẾ TRẮNG', 'DECAL BỂ GIÒN ĐẾ AMAZON', 'DECAL TỔ ONG'];
        foreach ($data as $key => $item) {
            DB::table('product_chat_lieus')->insert([
                'name' => $item,
            ]);
        }
    }
    private function createCanMang()
    {
        $data = [
            [
                'name' => 'Không có cán màng',
                'percent' => 0,
            ],
            [
                'name' => 'Bóng mờ',
                'percent' => 300,
            ],
            [
                'name' => 'Bóng mờ 1',
                'percent' => 300,
            ],
        ];
        DB::table('product_can_mangs')->insert($data);
    }
}
