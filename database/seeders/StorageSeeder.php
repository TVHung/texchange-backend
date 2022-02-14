<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class StorageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('storages')->delete();

        $storages = [
            ['id' => 1, 'category_id' => 1, 'capacity' => 8, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 2, 'category_id' => 1, 'capacity' => 16, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 3, 'category_id' => 1, 'capacity' => 32, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 4, 'category_id' => 1, 'capacity' => 64, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 5, 'category_id' => 1, 'capacity' => 128, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 6, 'category_id' => 1, 'capacity' => 256, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 7, 'category_id' => 1, 'capacity' => 512, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 8, 'category_id' => 1, 'capacity' => 1024, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 9, 'category_id' => 2, 'capacity' => 128, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 10, 'category_id' => 2, 'capacity' => 256, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 11, 'category_id' => 2, 'capacity' => 512, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 12, 'category_id' => 2, 'capacity' => 1024, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 13, 'category_id' => 3, 'capacity' => 128, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 14, 'category_id' => 3, 'capacity' => 256, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 15, 'category_id' => 3, 'capacity' => 512, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 16, 'category_id' => 3, 'capacity' => 1024, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
        ];

        DB::table('storages')->insert($storages);
    }
}
