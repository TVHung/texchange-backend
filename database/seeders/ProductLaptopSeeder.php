<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductLaptopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_laptops')->delete();

        $products = [
            [
                'id' => 104,
                'product_id'=> 104,
                'color'=> "Đỏ",
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 2,
                'brand_id'=> 2,
                'display_size'=> 15,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 105,
                'product_id'=> 105,
                'color'=> "Đỏ",
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 2,
                'brand_id'=> 2,
                'display_size'=> 15,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 106,
                'product_id'=> 106,
                'color'=> "Đỏ",
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 2,
                'brand_id'=> 2,
                'display_size'=> 15,
                
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 113,
                'product_id'=> 113,
                'color'=> "Đỏ",
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 2,
                'brand_id'=> 2,
                'display_size'=> 15,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 114,
                'product_id'=> 114,
                'color'=> "Đỏ",
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 2,
                'brand_id'=> 2,
                'display_size'=> 15,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 115,
                'product_id'=> 115,
                'color'=> "Đỏ",
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 2,
                'brand_id'=> 2,
                'display_size'=> 15,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
           [
                'id' => 122,
                'product_id'=> 122,
                'color'=> "Đỏ",
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 2,
                'brand_id'=> 2,
                'display_size'=> 15,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 123,
                'product_id'=> 123,
                'color'=> "Đỏ",
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 2,
                'brand_id'=> 2,
                'display_size'=> 15,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 124,
                'product_id'=> 124,
                'color'=> "Đỏ",
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 2,
                'brand_id'=> 2,
                'display_size'=> 15,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 131,
                'product_id'=> 131,
                'color'=> "Đỏ",
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 2,
                'brand_id'=> 2,
                'display_size'=> 15,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 132,
                'product_id'=> 132,
                'color'=> "Đỏ",
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 2,
                'brand_id'=> 2,
                'display_size'=> 15,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 133,
                'product_id'=> 133,
                'color'=> "Đỏ",
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 2,
                'brand_id'=> 2,
                'display_size'=> 15,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 140,
                'product_id'=> 140,
                'color'=> "Đỏ",
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 2,
                'brand_id'=> 2,
                'display_size'=> 15,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 141,
                'product_id'=> 141,
                'color'=> "Đỏ",
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 2,
                'brand_id'=> 2,
                'display_size'=> 15,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 142,
                'product_id'=> 142,
                'color'=> "Đỏ",
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 2,
                'brand_id'=> 2,
                'display_size'=> 15,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 149,
                'product_id'=> 149,
                'color'=> "Đỏ",
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 2,
                'brand_id'=> 2,
                'display_size'=> 15,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 150,
                'product_id'=> 150,
                'color'=> "Đỏ",
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 2,
                'brand_id'=> 2,
                'display_size'=> 15,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 151,
                'product_id'=> 151,
                'color'=> "Đỏ",
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 2,
                'brand_id'=> 2,
                'display_size'=> 15,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 157,
                'product_id'=> 157,
                'color'=> "Đỏ",
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 2,
                'brand_id'=> 2,
                'display_size'=> 15,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 158,
                'product_id'=> 158,
                'color'=> "Đỏ",
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 2,
                'brand_id'=> 2,
                'display_size'=> 15,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];

        DB::table('product_laptops')->insert($products);
    }
}
