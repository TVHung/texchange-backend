<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->delete();

        $messages = [
            ['id' => 101, 'message' => 'Đây là tin nhắn 1', 'image_url' => 'https://preview.redd.it/fykefscotzu21.png?width=719&format=png&auto=webp&s=cfd60447e871859f8af24bb7ae84c25994ecf88e', 'user_id' => 101, 'target_user_id' => 102, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 102, 'message' => 'Đây là tin nhắn 2', 'image_url' => null, 'user_id' => 101, 'target_user_id' => 102, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 103, 'message' => 'Đây là tin nhắn 3', 'image_url' => null, 'user_id' => 101, 'target_user_id' => 102, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 104, 'message' => 'Đây là tin nhắn 4', 'image_url' => 'https://preview.redd.it/fykefscotzu21.png?width=719&format=png&auto=webp&s=cfd60447e871859f8af24bb7ae84c25994ecf88e', 'user_id' => 102, 'target_user_id' => 101, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 105, 'message' => 'Đây là tin nhắn 5', 'image_url' => null, 'user_id' => 101, 'target_user_id' => 102, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 106, 'message' => 'Đây là tin nhắn 6', 'image_url' => null, 'user_id' => 101, 'target_user_id' => 102, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            
            ['id' => 107, 'message' => 'Đây là tin nhắn 7', 'image_url' => null, 'user_id' => 101, 'target_user_id' => 103, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 108, 'message' => 'Đây là tin nhắn 8', 'image_url' => 'https://preview.redd.it/fykefscotzu21.png?width=719&format=png&auto=webp&s=cfd60447e871859f8af24bb7ae84c25994ecf88e', 'user_id' => 103, 'target_user_id' => 102, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 109, 'message' => 'Đây là tin nhắn 9', 'image_url' => null, 'user_id' => 101, 'target_user_id' => 103, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 110, 'message' => 'Đây là tin nhắn 10', 'image_url' => null, 'user_id' => 101, 'target_user_id' => 103, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            
            ['id' => 111, 'message' => 'Đây là tin nhắn 11', 'image_url' => null, 'user_id' => 102, 'target_user_id' => 101, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 112, 'message' => 'Đây là tin nhắn 12', 'image_url' => 'https://preview.redd.it/fykefscotzu21.png?width=719&format=png&auto=webp&s=cfd60447e871859f8af24bb7ae84c25994ecf88e', 'user_id' => 104, 'target_user_id' => 102, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 113, 'message' => 'Đây là tin nhắn 13', 'image_url' => null, 'user_id' => 102, 'target_user_id' => 101, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 114, 'message' => 'Đây là tin nhắn 14', 'image_url' => null, 'user_id' => 102, 'target_user_id' => 101, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
        ];
        DB::table('messages')->insert($messages);
    }
}
