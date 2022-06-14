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
        // \App\Models\PostImage::factory(50)->create();
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
            [
                'id' => 328,
                'post_id'=> 110,
                'is_banner'=> 1,
                'image_url'=> "https://media.vneconomy.vn/w800/images/upload/2021/12/29/iphone-13-pro-max.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 329,
                'post_id'=> 111,
                'is_banner'=> 1,
                'image_url'=> "https://bachlongmobile.com/bnews/wp-content/uploads/2021/09/tren-tay-thuc-te-iphone-13-pro-max-819x1024.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 330,
                'post_id'=> 112,
                'is_banner'=> 1,
                'image_url'=> "https://genk.mediacdn.vn/139269124445442048/2021/4/21/photo-1-16189398046231706741295.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 331,
                'post_id'=> 113,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 332,
                'post_id'=> 114,
                'is_banner'=> 1,
                'image_url'=> "https://static.remove.bg/remove-bg-web/d450d501f6500a09e72d0e306a5d62768359d9fa/assets/start_remove-c851bdf8d3127a24e2d137a55b1b427378cd17385b01aec6e59d5d4b5f39d2ec.png",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 333,
                'post_id'=> 115,
                'is_banner'=> 1,
                'image_url'=> "http://www.maccenter.vn/Adv_Images/Banner-MacBookPro-2021-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 334,
                'post_id'=> 116,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 335,
                'post_id'=> 117,
                'is_banner'=> 1,
                'image_url'=> "https://static.remove.bg/remove-bg-web/d450d501f6500a09e72d0e306a5d62768359d9fa/assets/start_remove-c851bdf8d3127a24e2d137a55b1b427378cd17385b01aec6e59d5d4b5f39d2ec.png",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 336,
                'post_id'=> 118,
                'is_banner'=> 1,
                'image_url'=> "http://www.maccenter.vn/Adv_Images/Banner-MacBookPro-2021-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 337,
                'post_id'=> 119,
                'is_banner'=> 1,
                'image_url'=> "https://media.vneconomy.vn/w800/images/upload/2021/12/29/iphone-13-pro-max.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 338,
                'post_id'=> 120,
                'is_banner'=> 1,
                'image_url'=> "https://bachlongmobile.com/bnews/wp-content/uploads/2021/09/tren-tay-thuc-te-iphone-13-pro-max-819x1024.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 339,
                'post_id'=> 121,
                'is_banner'=> 1,
                'image_url'=> "https://genk.mediacdn.vn/139269124445442048/2021/4/21/photo-1-16189398046231706741295.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 340,
                'post_id'=> 122,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 341,
                'post_id'=> 123,
                'is_banner'=> 1,
                'image_url'=> "https://static.remove.bg/remove-bg-web/d450d501f6500a09e72d0e306a5d62768359d9fa/assets/start_remove-c851bdf8d3127a24e2d137a55b1b427378cd17385b01aec6e59d5d4b5f39d2ec.png",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 342,
                'post_id'=> 124,
                'is_banner'=> 1,
                'image_url'=> "http://www.maccenter.vn/Adv_Images/Banner-MacBookPro-2021-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 343,
                'post_id'=> 125,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 344,
                'post_id'=> 126,
                'is_banner'=> 1,
                'image_url'=> "https://static.remove.bg/remove-bg-web/d450d501f6500a09e72d0e306a5d62768359d9fa/assets/start_remove-c851bdf8d3127a24e2d137a55b1b427378cd17385b01aec6e59d5d4b5f39d2ec.png",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 345,
                'post_id'=> 127,
                'is_banner'=> 1,
                'image_url'=> "http://www.maccenter.vn/Adv_Images/Banner-MacBookPro-2021-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 346,
                'post_id'=> 128,
                'is_banner'=> 1,
                'image_url'=> "https://media.vneconomy.vn/w800/images/upload/2021/12/29/iphone-13-pro-max.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 347,
                'post_id'=> 129,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 348,
                'post_id'=> 130,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 349,
                'post_id'=> 131,
                'is_banner'=> 1,
                'image_url'=> "https://media.vneconomy.vn/w800/images/upload/2021/12/29/iphone-13-pro-max.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 350,
                'post_id'=> 132,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 351,
                'post_id'=> 133,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 352,
                'post_id'=> 134,
                'is_banner'=> 1,
                'image_url'=> "https://media.vneconomy.vn/w800/images/upload/2021/12/29/iphone-13-pro-max.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 353,
                'post_id'=> 135,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 354,
                'post_id'=> 136,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 355,
                'post_id'=> 137,
                'is_banner'=> 1,
                'image_url'=> "https://media.vneconomy.vn/w800/images/upload/2021/12/29/iphone-13-pro-max.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 356,
                'post_id'=> 138,
                'is_banner'=> 1,
                'image_url'=> "https://bachlongmobile.com/bnews/wp-content/uploads/2021/09/tren-tay-thuc-te-iphone-13-pro-max-819x1024.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 357,
                'post_id'=> 139,
                'is_banner'=> 1,
                'image_url'=> "https://genk.mediacdn.vn/139269124445442048/2021/4/21/photo-1-16189398046231706741295.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 358,
                'post_id'=> 140,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 359,
                'post_id'=> 141,
                'is_banner'=> 1,
                'image_url'=> "https://static.remove.bg/remove-bg-web/d450d501f6500a09e72d0e306a5d62768359d9fa/assets/start_remove-c851bdf8d3127a24e2d137a55b1b427378cd17385b01aec6e59d5d4b5f39d2ec.png",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 360,
                'post_id'=> 142,
                'is_banner'=> 1,
                'image_url'=> "http://www.maccenter.vn/Adv_Images/Banner-MacBookPro-2021-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 361,
                'post_id'=> 143,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 362,
                'post_id'=> 144,
                'is_banner'=> 1,
                'image_url'=> "https://static.remove.bg/remove-bg-web/d450d501f6500a09e72d0e306a5d62768359d9fa/assets/start_remove-c851bdf8d3127a24e2d137a55b1b427378cd17385b01aec6e59d5d4b5f39d2ec.png",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 363,
                'post_id'=> 145,
                'is_banner'=> 1,
                'image_url'=> "http://www.maccenter.vn/Adv_Images/Banner-MacBookPro-2021-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 364,
                'post_id'=> 146,
                'is_banner'=> 1,
                'image_url'=> "https://media.vneconomy.vn/w800/images/upload/2021/12/29/iphone-13-pro-max.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 365,
                'post_id'=> 147,
                'is_banner'=> 1,
                'image_url'=> "https://bachlongmobile.com/bnews/wp-content/uploads/2021/09/tren-tay-thuc-te-iphone-13-pro-max-819x1024.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 366,
                'post_id'=> 148,
                'is_banner'=> 1,
                'image_url'=> "https://genk.mediacdn.vn/139269124445442048/2021/4/21/photo-1-16189398046231706741295.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 367,
                'post_id'=> 149,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 368,
                'post_id'=> 150,
                'is_banner'=> 1,
                'image_url'=> "https://static.remove.bg/remove-bg-web/d450d501f6500a09e72d0e306a5d62768359d9fa/assets/start_remove-c851bdf8d3127a24e2d137a55b1b427378cd17385b01aec6e59d5d4b5f39d2ec.png",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 369,
                'post_id'=> 151,
                'is_banner'=> 1,
                'image_url'=> "http://www.maccenter.vn/Adv_Images/Banner-MacBookPro-2021-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 370,
                'post_id'=> 152,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 371,
                'post_id'=> 153,
                'is_banner'=> 1,
                'image_url'=> "https://static.remove.bg/remove-bg-web/d450d501f6500a09e72d0e306a5d62768359d9fa/assets/start_remove-c851bdf8d3127a24e2d137a55b1b427378cd17385b01aec6e59d5d4b5f39d2ec.png",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 372,
                'post_id'=> 154,
                'is_banner'=> 1,
                'image_url'=> "http://www.maccenter.vn/Adv_Images/Banner-MacBookPro-2021-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];

        DB::table('post_images')->insert($postImages);
    }
}
