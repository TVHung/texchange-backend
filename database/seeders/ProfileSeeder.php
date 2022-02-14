<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->delete();

        $profiles = [
            [
                'id' => 101,
                'user_id'=> 101,
                'name'=> "Trương Văn Hùng",
                'sex'=> "Nam",
                'avatar_url'=> "https://thiepnhanai.com/wp-content/uploads/2021/05/hinh-anh-dai-dien-dep-1.jpg",
                'phone'=> "0383621309",
                'address'=> "Yên phụ, Yên phong, Bắc Ninh",
                'facebook_url'=> "fb.com/hung.tv99",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 102,
                'user_id'=> 102,
                'name'=> "Trương Văn Hoàn",
                'sex'=> "Nam",
                'avatar_url'=> "https://pdp.edu.vn/wp-content/uploads/2021/05/hinh-anh-avatar-nam-1.jpg",
                'phone'=> "0383621309",
                'address'=> "Yên phụ, Yên phong, Bắc Ninh",
                'facebook_url'=> "fb.com/hung.tv99",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 103,
                'user_id'=> 103,
                'name'=> "Trương Văn Hưng",
                'sex'=> "Nam",
                'avatar_url'=> "https://dautubanthan.net/wp-content/uploads/2021/12/Hi%CC%80nh-da%CC%A3i-die%CC%A3%CC%82n-de%CC%A3p-da%CC%82%CC%81u-ma%CC%A3%CC%86t-cho-nam.jpg",
                'phone'=> "0383621309",
                'address'=> "Yên phụ, Yên phong, Bắc Ninh",
                'facebook_url'=> "fb.com/hung.tv99",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 104,
                'user_id'=> 104,
                'name'=> "Trương Tấn Sang",
                'sex'=> "Nam",
                'avatar_url'=> "https://thiepnhanai.com/wp-content/uploads/2021/05/hinh-anh-dai-dien-dep-1.jpg",
                'phone'=> "0383621309",
                'address'=> "Yên phụ, Yên phong, Bắc Ninh",
                'facebook_url'=> "fb.com/hung.tv99",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 105,
                'user_id'=> 105,
                'name'=> "Trương Thị Hoan",
                'sex'=> "Nam",
                'avatar_url'=> "https://thiepnhanai.com/wp-content/uploads/2021/05/hinh-anh-dai-dien-dep-1.jpg",
                'phone'=> "0383621309",
                'address'=> "Yên phụ, Yên phong, Bắc Ninh",
                'facebook_url'=> "fb.com/hung.tv99",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 106,
                'user_id'=> 106,
                'name'=> "Trương Thị Mỹ Tâm",
                'sex'=> "Nam",
                'avatar_url'=> "https://thiepnhanai.com/wp-content/uploads/2021/05/hinh-anh-dai-dien-dep-1.jpg",
                'phone'=> "0383621309",
                'address'=> "Yên phụ, Yên phong, Bắc Ninh",
                'facebook_url'=> "fb.com/hung.tv99",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        DB::table('profiles')->insert($profiles);
    }
}
