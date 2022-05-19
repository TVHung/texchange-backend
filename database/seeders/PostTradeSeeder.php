<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PostTradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_trades')->delete();

        $postTrades = [
            [
                'id' => 101,
                'post_id'=> 101,
                'category_id'=> 1,
                'title'=> "Đổi sang ipad cũ",
                'name'=> "Ipad mini 5",
                'description'=> "Hàng dùng ổn định",
                'guarantee'=> 1,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 102,
                'post_id'=> 102,
                'category_id'=> 2,
                'title'=> "Đổi sang máy tính cũ",
                'name'=> "Máy tính macbook 16 2019",
                'description'=> "Hàng dùng ổn định",
                'guarantee'=> 0,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        DB::table('post_trades')->insert($postTrades);
    }
}
