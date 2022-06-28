<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->delete();

        $comments = [
            [
                'id' => 101,
                'user_id' => 101,
                'product_id' => 101,
                'content' => 'Sản phẩm này còn không',
                'comment_parent_id' => null,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 102,
                'user_id' => 101,
                'product_id' => 101,
                'content' => 'Sản phẩm này còn bạn nhé',
                'comment_parent_id' => 101,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 103,
                'user_id' => 101,
                'product_id' => 101,
                'content' => 'Sản phẩm giá như thế nào',
                'comment_parent_id' => 101,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 104,
                'user_id' => 101,
                'product_id' => 101,
                'content' => 'Sản phẩm này còn không bạn ơi?',
                'comment_parent_id' => null,
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        DB::table('comments')->insert($comments);

    }
}
