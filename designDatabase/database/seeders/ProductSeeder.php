<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class ProductSeeder extends Seeder
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
                'name' => 'Product 1',
                'type' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Product 2',
                'type' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('product')->insert($data);
    }
}
