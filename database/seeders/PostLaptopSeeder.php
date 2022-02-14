<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class PostLaptopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_laptops')->delete();

        $postLaptops = [
            [
                'id' => 101,
                'post_id'=> 104,
                'color'=> "Đỏ",
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> "HDD",
                'brand_id'=> 2,
                'display_size'=> 15,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 102,
                'post_id'=> 105,
                'color'=> "Xanh",
                'cpu'=> "i9",
                'gpu'=> "amd radeon r3",
                'storage_type'=> "SDD",
                'brand_id'=> 1,
                'display_size'=> 14,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 103,
                'post_id'=> 106,
                'color'=> "Đen",
                'cpu'=> "i9",
                'gpu'=> "amd radeon r9",
                'storage_type'=> "HDD",
                'brand_id'=> 3,
                'display_size'=> 16,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            
        ];

        DB::table('post_laptops')->insert($postLaptops);
    }
}
