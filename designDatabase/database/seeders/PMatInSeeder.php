<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class PMatInSeeder extends Seeder
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
                'name' => '1 Mặt',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '2 Mặt',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Các mặt khác',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('p_mat_in')->insert($data);
    }
}
