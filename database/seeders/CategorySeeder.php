<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            ['id' => 1, 'name' => 'Mobile'],
            ['id' => 2, 'name' => 'Laptop'],
            ['id' => 3, 'name' => 'PC'],
        ];

        DB::table('categories')->insert($categories);
    }
}
