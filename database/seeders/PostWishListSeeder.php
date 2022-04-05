<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PostWishListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_wish_lists')->delete();

        $profiles = [
            [
                'id' => 101,
                'user_id'=> 101,
                'post_id' => 107,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 102,
                'user_id'=> 101,
                'post_id' => 108,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 103,
                'user_id'=> 101,
                'post_id' => 19,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 104,
                'user_id'=> 102,
                'post_id' => 101,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 105,
                'user_id'=> 102,
                'post_id' => 102,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 106,
                'user_id'=> 103,
                'post_id' => 105,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        DB::table('post_wish_lists')->insert($profiles);
    }
}
