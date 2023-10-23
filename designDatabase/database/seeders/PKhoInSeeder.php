<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class PKhoInSeeder extends Seeder
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
        foreach ($data as $key => $item) {
            $newKhoIn = $item;
            $newKhoIn['created_at'] = now();
            $newKhoIn['updated_at'] = now();
            DB::table('p_kho_in')->insert($newKhoIn);
        }
    }
}
