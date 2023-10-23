<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class PQuyCachSeeder extends Seeder
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
                'name' => 'Bế demi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bế trời',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('p_quy_cach')->insert($data);
    }
}
