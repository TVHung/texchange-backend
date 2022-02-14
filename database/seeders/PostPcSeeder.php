<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class PostPcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_pcs')->delete();

        $postPcs = [
            [
                'id' => 101,
                'post_id'=> 107,
                'cpu'=> "i5",
                'gpu'=> "amd radeon r7",
                'storage_type'=> "HDD",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 102,
                'post_id'=> 108,
                'cpu'=> "i3",
                'gpu'=> "amd radeon r7",
                'storage_type'=> "HDD",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 103,
                'post_id'=> 109,
                'cpu'=> "i9",
                'gpu'=> "amd radeon r7",
                'storage_type'=> "SSD",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];

        DB::table('post_pcs')->insert($postPcs);
    }
}
