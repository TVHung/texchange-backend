<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->delete();

        $posts = [
            [
                'id' => 101,
                'user_id'=> 101,
                'is_trade'=> 0,
                'post_trade_id'=> 0,
                'title'=> 'day la san pham 1',
                'category_id'=> 1,
                'name'=> 'Iphone 13',
                'description'=> 'Vi xử lý: Intel Core i5 11400H, 6 nhân / 12 luồng Màn hình: 15.6 FullHD IPS 144Hz (1920 x 1080), màn nhám Độ phủ màu: 65% sRGB',
                'ram'=> 6,
                'storage_id'=> 1,
                'status_id'=> 1,
                'price'=> 400000,
                'address_id'=> 101,
                'public_status'=> 1,
                'guarantee'=> 2,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 102,
                'user_id'=> 102,
                'is_trade'=> 0,
                'post_trade_id'=> 0,
                'title'=> 'day la san pham 2',
                'category_id'=> 1,
                'name'=> 'Iphone 14',
                'description'=> 'Vi xử lý: Intel Core i5 11400H, 6 nhân / 12 luồng Màn hình: 15.6 FullHD IPS 144Hz (1920 x 1080), màn nhám Độ phủ màu: 65% sRGB',
                'ram'=> 6,
                'storage_id'=> 1,
                'status_id'=> 1,
                'price'=> 400000,
                'address_id'=> 101,
                'public_status'=> 1,
                'guarantee'=> 2,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 103,
                'user_id'=> 103,
                'is_trade'=> 0,
                'post_trade_id'=> 0,
                'title'=> 'day la san pham 3',
                'category_id'=> 1,
                'name'=> 'Iphone 15',
                'description'=> 'Vi xử lý: Intel Core i5 11400H, 6 nhân / 12 luồng Màn hình: 15.6 FullHD IPS 144Hz (1920 x 1080), màn nhám Độ phủ màu: 65% sRGB',
                'ram'=> 6,
                'storage_id'=> 1,
                'status_id'=> 1,
                'price'=> 8200000,
                'address_id'=> 102,
                'public_status'=> 1,
                'guarantee'=> 2,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 104,
                'user_id'=> 104,
                'is_trade'=> 0,
                'post_trade_id'=> 0,
                'title'=> 'day la san pham 4',
                'category_id'=> 2,
                'name'=> 'Iphone 13',
                'description'=> 'Vi xử lý: Intel Core i5 11400H, 6 nhân / 12 luồng Màn hình: 15.6 FullHD IPS 144Hz (1920 x 1080), màn nhám Độ phủ màu: 65% sRGB',
                'ram'=> 6,
                'storage_id'=> 1,
                'status_id'=> 1,
                'price'=> 2900000,
                'address_id'=> 102,
                'public_status'=> 1,
                'guarantee'=> 2,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 105,
                'user_id'=> 105,
                'is_trade'=> 0,
                'post_trade_id'=> 0,
                'title'=> 'day la san pham 5',
                'category_id'=> 2,
                'name'=> 'Iphone 14',
                'description'=> 'Vi xử lý: Intel Core i5 11400H, 6 nhân / 12 luồng Màn hình: 15.6 FullHD IPS 144Hz (1920 x 1080), màn nhám Độ phủ màu: 65% sRGB',
                'ram'=> 6,
                'storage_id'=> 1,
                'status_id'=> 1,
                'price'=>9900000,
                'address_id'=> 101,
                'public_status'=> 1,
                'guarantee'=> 2,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 106,
                'user_id'=> 106,
                'is_trade'=> 0,
                'post_trade_id'=> 0,
                'title'=> 'day la san pham 6',
                'category_id'=> 2,
                'name'=> 'Iphone 15',
                'description'=> 'Vi xử lý: Intel Core i5 11400H, 6 nhân / 12 luồng Màn hình: 15.6 FullHD IPS 144Hz (1920 x 1080), màn nhám Độ phủ màu: 65% sRGB',
                'ram'=> 6,
                'storage_id'=> 1,
                'status_id'=> 1,
                'price'=> 4400000,
                'address_id'=> 102,
                'public_status'=> 1,
                'guarantee'=> 2,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 107,
                'user_id'=> 101,
                'is_trade'=> 0,
                'post_trade_id'=> 0,
                'title'=> 'day la san pham 7',
                'category_id'=> 3,
                'name'=> 'Iphone 13',
                'description'=> 'Vi xử lý: Intel Core i5 11400H, 6 nhân / 12 luồng Màn hình: 15.6 FullHD IPS 144Hz (1920 x 1080), màn nhám Độ phủ màu: 65% sRGB',
                'ram'=> 6,
                'storage_id'=> 1,
                'status_id'=> 1,
                'price'=> 12400000,
                'address_id'=> 101,
                'public_status'=> 1,
                'guarantee'=> 2,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 108,
                'user_id'=> 104,
                'is_trade'=> 0,
                'post_trade_id'=> 0,
                'title'=> 'day la san pham 8',
                'category_id'=> 3,
                'name'=> 'Iphone 14',
                'description'=> 'Vi xử lý: Intel Core i5 11400H, 6 nhân / 12 luồng Màn hình: 15.6 FullHD IPS 144Hz (1920 x 1080), màn nhám Độ phủ màu: 65% sRGB',
                'ram'=> 6,
                'storage_id'=> 1,
                'status_id'=> 1,
                'price'=>5400000,
                'address_id'=> 101,
                'public_status'=> 1,
                'guarantee'=> 2,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 109,
                'user_id'=> 106,
                'is_trade'=> 0,
                'post_trade_id'=> 0,
                'title'=> 'day la san pham 9',
                'category_id'=> 3,
                'name'=> 'Iphone 15',
                'description'=> 'Vi xử lý: Intel Core i5 11400H, 6 nhân / 12 luồng Màn hình: 15.6 FullHD IPS 144Hz (1920 x 1080), màn nhám Độ phủ màu: 65% sRGB',
                'ram'=> 6,
                'storage_id'=> 1,
                'status_id'=> 1,
                'price'=> 1400000,
                'address_id'=> 102,
                'public_status'=> 1,
                'guarantee'=> 2,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ]
        ];

        DB::table('posts')->insert($posts);
    }
}
