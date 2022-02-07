<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            ['id' => 1, 'category_id' => 1, 'capacity' => 8],
            ['id' => 2, 'category_id' => 1, 'capacity' => 16],
            ['id' => 3, 'category_id' => 1, 'capacity' => 32],
            ['id' => 4, 'category_id' => 1, 'capacity' => 64],
            ['id' => 5, 'category_id' => 1, 'capacity' => 128],
            ['id' => 6, 'category_id' => 1, 'capacity' => 256],
            ['id' => 7, 'category_id' => 1, 'capacity' => 512],
            ['id' => 8, 'category_id' => 1, 'capacity' => 1024],
            ['id' => 9, 'category_id' => 2, 'capacity' => 128],
            ['id' => 10, 'category_id' => 2, 'capacity' => 256],
            ['id' => 11, 'category_id' => 2, 'capacity' => 512],
            ['id' => 12, 'category_id' => 2, 'capacity' => 1024],
            ['id' => 13, 'category_id' => 3, 'capacity' => 128],
            ['id' => 14, 'category_id' => 3, 'capacity' => 256],
            ['id' => 15, 'category_id' => 3, 'capacity' => 512],
            ['id' => 16, 'category_id' => 3, 'capacity' => 1024],
        ];

        DB::table('storages')->insert($storages);
    }
}
