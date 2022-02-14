<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PostImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_images')->delete();

        $postImages = [
            [
                'id' => 301,
                'post_id'=> 101,
                'is_banner'=> 1,
                'image_url'=> "https://media.vneconomy.vn/w800/images/upload/2021/12/29/iphone-13-pro-max.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 302,
                'post_id'=> 101,
                'is_banner'=> 0,
                'image_url'=> "https://bachlongmobile.com/bnews/wp-content/uploads/2021/09/tren-tay-thuc-te-iphone-13-pro-max-819x1024.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 303,
                'post_id'=> 101,
                'is_banner'=> 0,
                'image_url'=> "https://genk.mediacdn.vn/139269124445442048/2021/4/21/photo-1-16189398046231706741295.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 304,
                'post_id'=> 102,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 305,
                'post_id'=> 102,
                'is_banner'=> 0,
                'image_url'=> "https://static.remove.bg/remove-bg-web/d450d501f6500a09e72d0e306a5d62768359d9fa/assets/start_remove-c851bdf8d3127a24e2d137a55b1b427378cd17385b01aec6e59d5d4b5f39d2ec.png",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 306,
                'post_id'=> 102,
                'is_banner'=> 0,
                'image_url'=> "http://www.maccenter.vn/Adv_Images/Banner-MacBookPro-2021-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 307,
                'post_id'=> 103,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 308,
                'post_id'=> 103,
                'is_banner'=> 0,
                'image_url'=> "https://static.remove.bg/remove-bg-web/d450d501f6500a09e72d0e306a5d62768359d9fa/assets/start_remove-c851bdf8d3127a24e2d137a55b1b427378cd17385b01aec6e59d5d4b5f39d2ec.png",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 309,
                'post_id'=> 103,
                'is_banner'=> 0,
                'image_url'=> "http://www.maccenter.vn/Adv_Images/Banner-MacBookPro-2021-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 310,
                'post_id'=> 104,
                'is_banner'=> 1,
                'image_url'=> "https://media.vneconomy.vn/w800/images/upload/2021/12/29/iphone-13-pro-max.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 311,
                'post_id'=> 104,
                'is_banner'=> 0,
                'image_url'=> "https://bachlongmobile.com/bnews/wp-content/uploads/2021/09/tren-tay-thuc-te-iphone-13-pro-max-819x1024.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 312,
                'post_id'=> 104,
                'is_banner'=> 0,
                'image_url'=> "https://genk.mediacdn.vn/139269124445442048/2021/4/21/photo-1-16189398046231706741295.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 313,
                'post_id'=> 105,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 314,
                'post_id'=> 105,
                'is_banner'=> 0,
                'image_url'=> "https://static.remove.bg/remove-bg-web/d450d501f6500a09e72d0e306a5d62768359d9fa/assets/start_remove-c851bdf8d3127a24e2d137a55b1b427378cd17385b01aec6e59d5d4b5f39d2ec.png",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 315,
                'post_id'=> 105,
                'is_banner'=> 0,
                'image_url'=> "http://www.maccenter.vn/Adv_Images/Banner-MacBookPro-2021-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 316,
                'post_id'=> 106,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 317,
                'post_id'=> 106,
                'is_banner'=> 0,
                'image_url'=> "https://static.remove.bg/remove-bg-web/d450d501f6500a09e72d0e306a5d62768359d9fa/assets/start_remove-c851bdf8d3127a24e2d137a55b1b427378cd17385b01aec6e59d5d4b5f39d2ec.png",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 318,
                'post_id'=> 106,
                'is_banner'=> 0,
                'image_url'=> "http://www.maccenter.vn/Adv_Images/Banner-MacBookPro-2021-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 319,
                'post_id'=> 107,
                'is_banner'=> 1,
                'image_url'=> "https://media.vneconomy.vn/w800/images/upload/2021/12/29/iphone-13-pro-max.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 320,
                'post_id'=> 107,
                'is_banner'=> 0,
                'image_url'=> "https://bachlongmobile.com/bnews/wp-content/uploads/2021/09/tren-tay-thuc-te-iphone-13-pro-max-819x1024.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 321,
                'post_id'=> 107,
                'is_banner'=> 0,
                'image_url'=> "https://genk.mediacdn.vn/139269124445442048/2021/4/21/photo-1-16189398046231706741295.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 322,
                'post_id'=> 108,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 323,
                'post_id'=> 108,
                'is_banner'=> 0,
                'image_url'=> "https://static.remove.bg/remove-bg-web/d450d501f6500a09e72d0e306a5d62768359d9fa/assets/start_remove-c851bdf8d3127a24e2d137a55b1b427378cd17385b01aec6e59d5d4b5f39d2ec.png",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 324,
                'post_id'=> 108,
                'is_banner'=> 0,
                'image_url'=> "http://www.maccenter.vn/Adv_Images/Banner-MacBookPro-2021-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 325,
                'post_id'=> 109,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 326,
                'post_id'=> 109,
                'is_banner'=> 0,
                'image_url'=> "https://static.remove.bg/remove-bg-web/d450d501f6500a09e72d0e306a5d62768359d9fa/assets/start_remove-c851bdf8d3127a24e2d137a55b1b427378cd17385b01aec6e59d5d4b5f39d2ec.png",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 327,
                'post_id'=> 109,
                'is_banner'=> 0,
                'image_url'=> "http://www.maccenter.vn/Adv_Images/Banner-MacBookPro-2021-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];

        DB::table('post_images')->insert($postImages);
    }
}
