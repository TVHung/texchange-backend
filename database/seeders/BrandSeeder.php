<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->delete();

        $brands = [
            ['id' => 1, 'category_id' => 1, 'name' => 'Samsung'],
            ['id' => 2, 'category_id' => 1, 'name' => 'Apple'],
            ['id' => 3, 'category_id' => 1, 'name' => 'Xiaomi'],
            ['id' => 4, 'category_id' => 2, 'name' => 'Acer'],
            ['id' => 5, 'category_id' => 2, 'name' => 'Dell'],
            ['id' => 6, 'category_id' => 2, 'name' => 'HP'],
            ['id' => 7, 'category_id' => 3, 'name' => 'Asus'],
            ['id' => 8, 'category_id' => 3, 'name' => 'Gigabyte'],
            ['id' => 9, 'category_id' => 3, 'name' => 'Dell'],
        ];

        DB::table('brands')->insert($brands);
    }
}
