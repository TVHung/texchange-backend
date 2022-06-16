<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductMobileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_mobiles')->delete();

        $products = [
            [
                'id' => 101,
                'product_id'=> 101,
                'color'=> "Đỏ",
                'brand_id'=> 2,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 102,
                'product_id'=> 102,
                'color'=> "Đỏ",
                'brand_id'=> 2,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 103,
                'product_id'=> 103,
                'color'=> "Đỏ",
                'brand_id'=> 2,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 110,
                'product_id'=> 110,
                'color'=> "Đỏ",
                'brand_id'=> 2,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 111,
                'product_id'=> 111,
                'color'=> "Đỏ",
                'brand_id'=> 2,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 112,
                'product_id'=> 112,
                'color'=> "Đỏ",
                'brand_id'=> 2,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 119,
                'product_id'=> 119,
                'color'=> "Đỏ",
                'brand_id'=> 2,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 120,
                'product_id'=> 120,
                'color'=> "Đỏ",
                'brand_id'=> 2,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 121,
                'product_id'=> 121,
                'color'=> "Đỏ",
                'brand_id'=> 2,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 128,
                'product_id'=> 128,
                'color'=> "Đỏ",
                'brand_id'=> 2,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 129,
                'product_id'=> 129,
                'color'=> "Đỏ",
                'brand_id'=> 2,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 130,
                'product_id'=> 130,
                'color'=> "Đỏ",
                'brand_id'=> 2,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 137,
                'product_id'=> 137,
                'color'=> "Đỏ",
                'brand_id'=> 2,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 138,
                'product_id'=> 138,
                'color'=> "Đỏ",
                'brand_id'=> 2,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 139,
                'product_id'=> 139,
                'color'=> "Đỏ",
                'brand_id'=> 2,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 146,
                'product_id'=> 146,
                'color'=> "Đỏ",
                'brand_id'=> 2,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 147,
                'product_id'=> 147,
                'color'=> "Đỏ",
                'brand_id'=> 2,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 148,
                'product_id'=> 148,
                'color'=> "Đỏ",
                'brand_id'=> 2,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 155,
                'product_id'=> 155,
                'color'=> "Đỏ",
                'brand_id'=> 2,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 156,
                'product_id'=> 156,
                'color'=> "Đỏ",
                'brand_id'=> 2,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];

        DB::table('product_mobiles')->insert($products);
    }
}
