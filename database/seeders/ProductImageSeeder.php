<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\ProductImage::factory(50)->create();
        DB::table('product_images')->delete();

        $productImages = [
            [
                'id' => 301,
                'product_id'=> 101,
                'is_banner'=> 1,
                'image_url'=> "https://media.vneconomy.vn/w800/images/upload/2021/12/29/iphone-13-pro-max.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 302,
                'product_id'=> 101,
                'is_banner'=> 0,
                'image_url'=> "https://bachlongmobile.com/bnews/wp-content/uploads/2021/09/tren-tay-thuc-te-iphone-13-pro-max-819x1024.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 303,
                'product_id'=> 101,
                'is_banner'=> 0,
                'image_url'=> "https://genk.mediacdn.vn/139269124445442048/2021/4/21/photo-1-16189398046231706741295.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 304,
                'product_id'=> 102,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 305,
                'product_id'=> 102,
                'is_banner'=> 0,
                'image_url'=> "https://static.remove.bg/remove-bg-web/d450d501f6500a09e72d0e306a5d62768359d9fa/assets/start_remove-c851bdf8d3127a24e2d137a55b1b427378cd17385b01aec6e59d5d4b5f39d2ec.png",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 306,
                'product_id'=> 102,
                'is_banner'=> 0,
                'image_url'=> "http://www.maccenter.vn/Adv_Images/Banner-MacBookPro-2021-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 307,
                'product_id'=> 103,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 308,
                'product_id'=> 103,
                'is_banner'=> 0,
                'image_url'=> "https://static.remove.bg/remove-bg-web/d450d501f6500a09e72d0e306a5d62768359d9fa/assets/start_remove-c851bdf8d3127a24e2d137a55b1b427378cd17385b01aec6e59d5d4b5f39d2ec.png",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 309,
                'product_id'=> 103,
                'is_banner'=> 0,
                'image_url'=> "http://www.maccenter.vn/Adv_Images/Banner-MacBookPro-2021-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 310,
                'product_id'=> 104,
                'is_banner'=> 1,
                'image_url'=> "https://media.vneconomy.vn/w800/images/upload/2021/12/29/iphone-13-pro-max.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 311,
                'product_id'=> 104,
                'is_banner'=> 0,
                'image_url'=> "https://bachlongmobile.com/bnews/wp-content/uploads/2021/09/tren-tay-thuc-te-iphone-13-pro-max-819x1024.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 312,
                'product_id'=> 104,
                'is_banner'=> 0,
                'image_url'=> "https://genk.mediacdn.vn/139269124445442048/2021/4/21/photo-1-16189398046231706741295.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 313,
                'product_id'=> 105,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 314,
                'product_id'=> 105,
                'is_banner'=> 0,
                'image_url'=> "https://static.remove.bg/remove-bg-web/d450d501f6500a09e72d0e306a5d62768359d9fa/assets/start_remove-c851bdf8d3127a24e2d137a55b1b427378cd17385b01aec6e59d5d4b5f39d2ec.png",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 315,
                'product_id'=> 105,
                'is_banner'=> 0,
                'image_url'=> "http://www.maccenter.vn/Adv_Images/Banner-MacBookPro-2021-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 316,
                'product_id'=> 106,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 317,
                'product_id'=> 106,
                'is_banner'=> 0,
                'image_url'=> "https://static.remove.bg/remove-bg-web/d450d501f6500a09e72d0e306a5d62768359d9fa/assets/start_remove-c851bdf8d3127a24e2d137a55b1b427378cd17385b01aec6e59d5d4b5f39d2ec.png",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 318,
                'product_id'=> 106,
                'is_banner'=> 0,
                'image_url'=> "http://www.maccenter.vn/Adv_Images/Banner-MacBookPro-2021-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 319,
                'product_id'=> 107,
                'is_banner'=> 1,
                'image_url'=> "https://media.vneconomy.vn/w800/images/upload/2021/12/29/iphone-13-pro-max.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 320,
                'product_id'=> 107,
                'is_banner'=> 0,
                'image_url'=> "https://bachlongmobile.com/bnews/wp-content/uploads/2021/09/tren-tay-thuc-te-iphone-13-pro-max-819x1024.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 321,
                'product_id'=> 107,
                'is_banner'=> 0,
                'image_url'=> "https://genk.mediacdn.vn/139269124445442048/2021/4/21/photo-1-16189398046231706741295.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 322,
                'product_id'=> 108,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 323,
                'product_id'=> 108,
                'is_banner'=> 0,
                'image_url'=> "https://static.remove.bg/remove-bg-web/d450d501f6500a09e72d0e306a5d62768359d9fa/assets/start_remove-c851bdf8d3127a24e2d137a55b1b427378cd17385b01aec6e59d5d4b5f39d2ec.png",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 324,
                'product_id'=> 108,
                'is_banner'=> 0,
                'image_url'=> "http://www.maccenter.vn/Adv_Images/Banner-MacBookPro-2021-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 325,
                'product_id'=> 109,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 326,
                'product_id'=> 109,
                'is_banner'=> 0,
                'image_url'=> "https://static.remove.bg/remove-bg-web/d450d501f6500a09e72d0e306a5d62768359d9fa/assets/start_remove-c851bdf8d3127a24e2d137a55b1b427378cd17385b01aec6e59d5d4b5f39d2ec.png",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 327,
                'product_id'=> 109,
                'is_banner'=> 0,
                'image_url'=> "http://www.maccenter.vn/Adv_Images/Banner-MacBookPro-2021-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 328,
                'product_id'=> 110,
                'is_banner'=> 1,
                'image_url'=> "https://media.vneconomy.vn/w800/images/upload/2021/12/29/iphone-13-pro-max.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 329,
                'product_id'=> 111,
                'is_banner'=> 1,
                'image_url'=> "https://bachlongmobile.com/bnews/wp-content/uploads/2021/09/tren-tay-thuc-te-iphone-13-pro-max-819x1024.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 330,
                'product_id'=> 112,
                'is_banner'=> 1,
                'image_url'=> "https://genk.mediacdn.vn/139269124445442048/2021/4/21/photo-1-16189398046231706741295.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 331,
                'product_id'=> 113,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 332,
                'product_id'=> 114,
                'is_banner'=> 1,
                'image_url'=> "https://static.remove.bg/remove-bg-web/d450d501f6500a09e72d0e306a5d62768359d9fa/assets/start_remove-c851bdf8d3127a24e2d137a55b1b427378cd17385b01aec6e59d5d4b5f39d2ec.png",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 333,
                'product_id'=> 115,
                'is_banner'=> 1,
                'image_url'=> "http://www.maccenter.vn/Adv_Images/Banner-MacBookPro-2021-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 334,
                'product_id'=> 116,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 335,
                'product_id'=> 117,
                'is_banner'=> 1,
                'image_url'=> "https://static.remove.bg/remove-bg-web/d450d501f6500a09e72d0e306a5d62768359d9fa/assets/start_remove-c851bdf8d3127a24e2d137a55b1b427378cd17385b01aec6e59d5d4b5f39d2ec.png",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 336,
                'product_id'=> 118,
                'is_banner'=> 1,
                'image_url'=> "http://www.maccenter.vn/Adv_Images/Banner-MacBookPro-2021-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 337,
                'product_id'=> 119,
                'is_banner'=> 1,
                'image_url'=> "https://media.vneconomy.vn/w800/images/upload/2021/12/29/iphone-13-pro-max.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 338,
                'product_id'=> 120,
                'is_banner'=> 1,
                'image_url'=> "https://bachlongmobile.com/bnews/wp-content/uploads/2021/09/tren-tay-thuc-te-iphone-13-pro-max-819x1024.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 339,
                'product_id'=> 121,
                'is_banner'=> 1,
                'image_url'=> "https://genk.mediacdn.vn/139269124445442048/2021/4/21/photo-1-16189398046231706741295.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 340,
                'product_id'=> 122,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 341,
                'product_id'=> 123,
                'is_banner'=> 1,
                'image_url'=> "https://static.remove.bg/remove-bg-web/d450d501f6500a09e72d0e306a5d62768359d9fa/assets/start_remove-c851bdf8d3127a24e2d137a55b1b427378cd17385b01aec6e59d5d4b5f39d2ec.png",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 342,
                'product_id'=> 124,
                'is_banner'=> 1,
                'image_url'=> "http://www.maccenter.vn/Adv_Images/Banner-MacBookPro-2021-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 343,
                'product_id'=> 125,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 344,
                'product_id'=> 126,
                'is_banner'=> 1,
                'image_url'=> "https://static.remove.bg/remove-bg-web/d450d501f6500a09e72d0e306a5d62768359d9fa/assets/start_remove-c851bdf8d3127a24e2d137a55b1b427378cd17385b01aec6e59d5d4b5f39d2ec.png",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 345,
                'product_id'=> 127,
                'is_banner'=> 1,
                'image_url'=> "http://www.maccenter.vn/Adv_Images/Banner-MacBookPro-2021-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 346,
                'product_id'=> 128,
                'is_banner'=> 1,
                'image_url'=> "https://media.vneconomy.vn/w800/images/upload/2021/12/29/iphone-13-pro-max.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 347,
                'product_id'=> 129,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 348,
                'product_id'=> 130,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 349,
                'product_id'=> 131,
                'is_banner'=> 1,
                'image_url'=> "https://media.vneconomy.vn/w800/images/upload/2021/12/29/iphone-13-pro-max.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 350,
                'product_id'=> 132,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 351,
                'product_id'=> 133,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 352,
                'product_id'=> 134,
                'is_banner'=> 1,
                'image_url'=> "https://media.vneconomy.vn/w800/images/upload/2021/12/29/iphone-13-pro-max.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 353,
                'product_id'=> 135,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 354,
                'product_id'=> 136,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 355,
                'product_id'=> 137,
                'is_banner'=> 1,
                'image_url'=> "https://media.vneconomy.vn/w800/images/upload/2021/12/29/iphone-13-pro-max.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 356,
                'product_id'=> 138,
                'is_banner'=> 1,
                'image_url'=> "https://bachlongmobile.com/bnews/wp-content/uploads/2021/09/tren-tay-thuc-te-iphone-13-pro-max-819x1024.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 357,
                'product_id'=> 139,
                'is_banner'=> 1,
                'image_url'=> "https://genk.mediacdn.vn/139269124445442048/2021/4/21/photo-1-16189398046231706741295.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 358,
                'product_id'=> 140,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 359,
                'product_id'=> 141,
                'is_banner'=> 1,
                'image_url'=> "https://static.remove.bg/remove-bg-web/d450d501f6500a09e72d0e306a5d62768359d9fa/assets/start_remove-c851bdf8d3127a24e2d137a55b1b427378cd17385b01aec6e59d5d4b5f39d2ec.png",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 360,
                'product_id'=> 142,
                'is_banner'=> 1,
                'image_url'=> "http://www.maccenter.vn/Adv_Images/Banner-MacBookPro-2021-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 361,
                'product_id'=> 143,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 362,
                'product_id'=> 144,
                'is_banner'=> 1,
                'image_url'=> "https://static.remove.bg/remove-bg-web/d450d501f6500a09e72d0e306a5d62768359d9fa/assets/start_remove-c851bdf8d3127a24e2d137a55b1b427378cd17385b01aec6e59d5d4b5f39d2ec.png",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 363,
                'product_id'=> 145,
                'is_banner'=> 1,
                'image_url'=> "http://www.maccenter.vn/Adv_Images/Banner-MacBookPro-2021-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 364,
                'product_id'=> 146,
                'is_banner'=> 1,
                'image_url'=> "https://media.vneconomy.vn/w800/images/upload/2021/12/29/iphone-13-pro-max.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 365,
                'product_id'=> 147,
                'is_banner'=> 1,
                'image_url'=> "https://bachlongmobile.com/bnews/wp-content/uploads/2021/09/tren-tay-thuc-te-iphone-13-pro-max-819x1024.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 366,
                'product_id'=> 148,
                'is_banner'=> 1,
                'image_url'=> "https://genk.mediacdn.vn/139269124445442048/2021/4/21/photo-1-16189398046231706741295.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 367,
                'product_id'=> 149,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 368,
                'product_id'=> 150,
                'is_banner'=> 1,
                'image_url'=> "https://static.remove.bg/remove-bg-web/d450d501f6500a09e72d0e306a5d62768359d9fa/assets/start_remove-c851bdf8d3127a24e2d137a55b1b427378cd17385b01aec6e59d5d4b5f39d2ec.png",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 369,
                'product_id'=> 151,
                'is_banner'=> 1,
                'image_url'=> "http://www.maccenter.vn/Adv_Images/Banner-MacBookPro-2021-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 370,
                'product_id'=> 152,
                'is_banner'=> 1,
                'image_url'=> "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/19/637702682508615222_macbook-pro-16-2021-xam-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 371,
                'product_id'=> 153,
                'is_banner'=> 1,
                'image_url'=> "https://static.remove.bg/remove-bg-web/d450d501f6500a09e72d0e306a5d62768359d9fa/assets/start_remove-c851bdf8d3127a24e2d137a55b1b427378cd17385b01aec6e59d5d4b5f39d2ec.png",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 372,
                'product_id'=> 154,
                'is_banner'=> 1,
                'image_url'=> "http://www.maccenter.vn/Adv_Images/Banner-MacBookPro-2021-1.jpg",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];

        DB::table('product_images')->insert($productImages);
    }
}
