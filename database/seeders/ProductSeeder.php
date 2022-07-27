<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Product::factory(5)->create();
        DB::table('products')->delete();

        $products = [];

        for ($x = 101; $x <= 200; $x++) {
            $dataItem = [
                'id' => $x,
                'user_id'=> rand(101, 136),
                'is_trade'=> rand(0,1),
                'title'=> 'Sản phẩm điện thoại',
                'category_id'=> 1,
                'name'=> 'Điện thoại',
                'description'=> 'Vi xử lý: Intel Core i5 11400H, 6 nhân / 12 luồng Màn hình: 15.6 FullHD IPS 144Hz (1920 x 1080), màn nhám Độ phủ màu: 65% sRGB',
                'ram'=> rand(0, 12),
                'storage'=> 128,
                'status'=> rand(1,3),
                'price'=> rand(0, 15000000),
                'address'=> "Xã Yên Phụ, Huyện Yên Phong, Tỉnh Bắc Ninh",
                'video_url'=> "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4",
                'public_status'=> rand(0,1),
                'guarantee'=> rand(0,24),
                'sold' => rand(0,1),
                'is_block' => 0,
                'view' => 0,
                'command' => rand(1,4),
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ];
            array_push($products, $dataItem);
        }

        for ($x = 201; $x <= 300; $x++) {
            $dataItem = [
                'id' => $x,
                'user_id'=> rand(101, 136),
                'is_trade'=> rand(0,1),
                'title'=> 'Sản phẩm laptop',
                'category_id'=> 2,
                'name'=> 'Laptop',
                'description'=> 'Vi xử lý: Intel Core i5 11400H, 6 nhân / 12 luồng Màn hình: 15.6 FullHD IPS 144Hz (1920 x 1080), màn nhám Độ phủ màu: 65% sRGB',
                'ram'=> rand(0, 12),
                'storage'=> 128,
                'status'=> rand(1,3),
                'price'=> rand(0, 25000000),
                'address'=> "Xã Yên Phụ, Huyện Yên Phong, Tỉnh Bắc Ninh",
                'video_url'=> "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4",
                'public_status'=> rand(0,1),
                'guarantee'=> rand(0,24),
                'sold' => rand(0,1),
                'is_block' => 0,
                'view' => 0,
                'command' => rand(1,4),
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ];
            array_push($products, $dataItem);
        }

        for ($x = 301; $x <= 400; $x++) {
            $dataItem = [
                'id' => $x,
                'user_id'=> rand(101, 136),
                'is_trade'=> rand(0,1),
                'title'=> 'Sản phẩm pc',
                'category_id'=> 3,
                'name'=> 'Máy tính',
                'description'=> 'Vi xử lý: Intel Core i5 11400H, 6 nhân / 12 luồng Màn hình: 15.6 FullHD IPS 144Hz (1920 x 1080), màn nhám Độ phủ màu: 65% sRGB',
                'ram'=> rand(0, 12),
                'storage'=> 128,
                'status'=> rand(1,3),
                'price'=> rand(0, 25000000),
                'address'=> "Xã Yên Phụ, Huyện Yên Phong, Tỉnh Bắc Ninh",
                'video_url'=> "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4",
                'public_status'=> rand(0,1),
                'guarantee'=> rand(0,24),
                'sold' => rand(0,1),
                'is_block' => 0,
                'view' => 0,
                'command' => rand(1,4),
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ];
            array_push($products, $dataItem);
        }

        DB::table('products')->insert($products);
    }
}
