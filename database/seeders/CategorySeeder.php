<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();

        $categories = [
            ['id' => 1, 'name' => 'Mobile', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 2, 'name' => 'Laptop', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 3, 'name' => 'PC', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
        ];

        DB::table('categories')->insert($categories);
    }
}
