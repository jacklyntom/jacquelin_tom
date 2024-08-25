<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'product_name'  => 'LG mobile',
                'price'         => '50000',
                'category_id'  => 1,
                'description'   => 'A smartphone with 4 gb RAM and have 5 cameras',
                'gallery'       => 'phone.png',
                'is_active'     => 1,
                'is_deleted'    => 0,

            ],
            [
                'product_name'  => 'vivo mobile',
                'price'         => '50000',
                'category_id'  => 1,
                'description'   => 'A smartphone with 4 gb RAM and have 5 cameras',
                'gallery'       => 'vivo.png',
                'is_active'     => 1,
                'is_deleted'    => 0,

            ],
            [
                'product_name'  => 'oppo mobile',
                'price'         => '60000',
                'category_id'      => 1,
                'description'   => 'A smartphone with 8 gb RAM and have 5 cameras',
                'gallery'       => 'oppo.jpg',
                'is_active'     => 1,
                'is_deleted'    => 0,

                ],
            [
                'product_name'  => 'panasonic tv',
                'price'         => '80000',
                'category_id'  => 1,
                'description'   => 'A tv with nice speakers and HD clarity',
                'gallery'       => 'pansonic tv.png',
                'is_active'     => 1,
                'is_deleted'    => 0,

                ],

        ]);
    }
}
