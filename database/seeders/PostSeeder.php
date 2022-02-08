<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'user_id'=> 1,
                'is_trade'=> 1,
                'post_trade_id'=> 2,
                'title'=> 'day la san pham',
                'category_id'=> 1,
                'name'=> 'Iphone 13',
                'description'=> 'asdfasdadas',
                'ram'=> 6,
                'storage_id'=> 1,
                'status_id'=> 1,
                'price'=> 400000,
                'address_id'=> 1,
                'public_status'=> 1,
                'guarantee'=> 2,
            ],
            [
                'user_id'=> 1,
                'is_trade'=> 1,
                'post_trade_id'=> 2,
                'title'=> 'day la san pham',
                'category_id'=> 1,
                'name'=> 'Iphone 14',
                'description'=> 'asdfasdadas',
                'ram'=> 6,
                'storage_id'=> 1,
                'status_id'=> 1,
                'price'=> 400000,
                'address_id'=> 1,
                'public_status'=> 1,
                'guarantee'=> 2,
            ],
            [
                'user_id'=> 1,
                'is_trade'=> 1,
                'post_trade_id'=> 2,
                'title'=> 'day la san pham',
                'category_id'=> 1,
                'name'=> 'Iphone 15',
                'description'=> 'asdfasdadas',
                'ram'=> 6,
                'storage_id'=> 1,
                'status_id'=> 1,
                'price'=> 400000,
                'address_id'=> 1,
                'public_status'=> 1,
                'guarantee'=> 2,
            ]
        ];

        DB::table('posts')->insert($posts);
    }
}
