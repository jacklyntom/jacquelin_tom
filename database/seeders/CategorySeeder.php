<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'category_name' => 'Electronics',
                'image'         => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRBDMpAlJvlbciO5em4u21B89yiMny281qjqw&s',
                'is_active'     => 0,

            ],
            [
                'category_name' => 'fruits',
                'image'         => 'https://img.pikbest.com/ai/illus_our/20230423/90d0c4fab45a67cc49915b522a1652b5.jpg!w700wp',
                'is_active'    => 0,

            ],


        ]);
    }
}
