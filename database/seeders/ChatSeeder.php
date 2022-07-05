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
        DB::table('conversations')->delete();
        DB::table('participants')->delete();
        DB::table('messages')->delete();

        $conversations = [
            ['id' => 101, 'name' => 'Friend', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 102, 'name' => null, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 103, 'name' => 'New friend', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
        ];
        $participants = [
            ['id' => 101, 'conversation_id' => 101 , 'user_id' => 101,  'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 102, 'conversation_id' => 101 , 'user_id' => 102,  'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 103, 'conversation_id' => 102 , 'user_id' => 101,  'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 104, 'conversation_id' => 102 , 'user_id' => 103,  'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 105, 'conversation_id' => 103 , 'user_id' => 101,  'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 106, 'conversation_id' => 103 , 'user_id' => 104,  'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
        ];
        $messages = [
            ['id' => 101, 'message' => 'Đây là tin nhắn 1', 'image_url' => 'https://preview.redd.it/fykefscotzu21.png?width=719&format=png&auto=webp&s=cfd60447e871859f8af24bb7ae84c25994ecf88e', 'user_id' => 101, 'conversation_id' => 101, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 102, 'message' => 'Đây là tin nhắn 2', 'image_url' => null, 'user_id' => 102, 'conversation_id' => 101, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 103, 'message' => 'Đây là tin nhắn 3', 'image_url' => null, 'user_id' => 101, 'conversation_id' => 101, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 104, 'message' => 'Đây là tin nhắn 4', 'image_url' => 'https://preview.redd.it/fykefscotzu21.png?width=719&format=png&auto=webp&s=cfd60447e871859f8af24bb7ae84c25994ecf88e', 'user_id' => 102, 'conversation_id' => 101, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 105, 'message' => 'Đây là tin nhắn 5', 'image_url' => null, 'user_id' => 101, 'conversation_id' => 101, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 106, 'message' => 'Đây là tin nhắn 6', 'image_url' => null, 'user_id' => 101, 'conversation_id' => 101, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            
            ['id' => 107, 'message' => 'Đây là tin nhắn 7', 'image_url' => null, 'user_id' => 101, 'conversation_id' => 102, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 108, 'message' => 'Đây là tin nhắn 8', 'image_url' => 'https://preview.redd.it/fykefscotzu21.png?width=719&format=png&auto=webp&s=cfd60447e871859f8af24bb7ae84c25994ecf88e', 'user_id' => 103, 'conversation_id' => 102, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 109, 'message' => 'Đây là tin nhắn 9', 'image_url' => null, 'user_id' => 101, 'conversation_id' => 102, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 110, 'message' => 'Đây là tin nhắn 10', 'image_url' => null, 'user_id' => 101, 'conversation_id' => 102, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            
            ['id' => 111, 'message' => 'Đây là tin nhắn 11', 'image_url' => null, 'user_id' => 101, 'conversation_id' => 103, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 112, 'message' => 'Đây là tin nhắn 12', 'image_url' => 'https://preview.redd.it/fykefscotzu21.png?width=719&format=png&auto=webp&s=cfd60447e871859f8af24bb7ae84c25994ecf88e', 'user_id' => 104, 'conversation_id' => 102, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 113, 'message' => 'Đây là tin nhắn 13', 'image_url' => null, 'user_id' => 101, 'conversation_id' => 103, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 114, 'message' => 'Đây là tin nhắn 14', 'image_url' => null, 'user_id' => 101, 'conversation_id' => 103, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
        ];

        DB::table('conversations')->insert($conversations);
        DB::table('participants')->insert($participants);
        DB::table('messages')->insert($messages);
    }
}
