<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
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
            ['id' => 1, 'category_id' => 1, 'name' => 'Apple', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 2, 'category_id' => 1, 'name' => 'Asus', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 3, 'category_id' => 1, 'name' => 'BKAV', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 4, 'category_id' => 1, 'name' => 'Blackberry', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 5, 'category_id' => 1, 'name' => 'Google', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 6, 'category_id' => 1, 'name' => 'HTC', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 7, 'category_id' => 1, 'name' => 'Huawei', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 8, 'category_id' => 1, 'name' => 'Lenovo', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 9, 'category_id' => 1, 'name' => 'LG', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 10, 'category_id' => 1, 'name' => 'Meizu', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 11, 'category_id' => 1, 'name' => 'Nokia', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 12, 'category_id' => 1, 'name' => 'OnePlus', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 13, 'category_id' => 1, 'name' => 'Oppo', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 14, 'category_id' => 1, 'name' => 'Realme', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 15, 'category_id' => 1, 'name' => 'Samsung', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 16, 'category_id' => 1, 'name' => 'Sharp', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 17, 'category_id' => 1, 'name' => 'Sony', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 18, 'category_id' => 1, 'name' => 'Vertu', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 19, 'category_id' => 1, 'name' => 'Vivo', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 20, 'category_id' => 1, 'name' => 'Vsmart', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 21, 'category_id' => 1, 'name' => 'Xiaomi', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 22, 'category_id' => 1, 'name' => 'Hãng khác', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],

            ['id' => 23, 'category_id' => 2, 'name' => 'Apple', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 24, 'category_id' => 2, 'name' => 'Asus', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 25, 'category_id' => 2, 'name' => 'HP', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 26, 'category_id' => 2, 'name' => 'Dell', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 27, 'category_id' => 2, 'name' => 'Lenovo', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 28, 'category_id' => 2, 'name' => 'Acer', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 29, 'category_id' => 2, 'name' => 'Samsung', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 30, 'category_id' => 2, 'name' => 'Toshiba', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 31, 'category_id' => 2, 'name' => 'MSI', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 32, 'category_id' => 2, 'name' => 'Sony', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 33, 'category_id' => 2, 'name' => 'Razer', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 34, 'category_id' => 2, 'name' => 'LG', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 35, 'category_id' => 2, 'name' => 'Panasonic', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 36, 'category_id' => 2, 'name' => 'Microsoft', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 37, 'category_id' => 2, 'name' => 'Hãng khác', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
        ];

        DB::table('brands')->insert($brands);
    }
}
