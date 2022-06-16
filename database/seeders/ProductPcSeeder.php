<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductPcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_pcs')->delete();

        $products = [
            [
                'id' => 107,
                'product_id'=> 107,
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 0,
                'display_size'=> null,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 108,
                'product_id'=> 108,
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 0,
                'display_size'=> null,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 109,
                'product_id'=> 109,
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 0,
                'display_size'=> null,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 116,
                'product_id'=> 116,
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 0,
                'display_size'=> null,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 117,
                'product_id'=> 117,
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 0,
                'display_size'=> null,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 118,
                'product_id'=> 118,
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 0,
                'display_size'=> null,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 125,
                'product_id'=> 125,
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 0,
                'display_size'=> null,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 126,
                'product_id'=> 126,
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 0,
                'display_size'=> null,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 127,
                'product_id'=> 127,
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 0,
                'display_size'=> null,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 134,
                'product_id'=> 134,
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 0,
                'display_size'=> null,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 135,
                'product_id'=> 135,
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 0,
                'display_size'=> null,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 136,
                'product_id'=> 136,
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 0,
                'display_size'=> null,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 143,
                'product_id'=> 143,
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 0,
                'display_size'=> null,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 144,
                'product_id'=> 144,
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 0,
                'display_size'=> null,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 145,
                'product_id'=> 145,
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 0,
                'display_size'=> null,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 152,
                'product_id'=> 152,
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 0,
                'display_size'=> null,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 153,
                'product_id'=> 153,
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 0,
                'display_size'=> null,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 154,
                'product_id'=> 154,
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 0,
                'display_size'=> null,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 159,
                'product_id'=> 159,
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 0,
                'display_size'=> null,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 160,
                'product_id'=> 160,
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> 0,
                'display_size'=> null,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];

        DB::table('product_pcs')->insert($products);
    }
}
