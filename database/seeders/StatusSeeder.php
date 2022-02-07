<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->delete();

        $status = [
            ['id' => 1, 'name' => 'Mới'],
            ['id' => 2, 'name' => 'Cũ (99%)'],
            ['id' => 3, 'name' => 'Cũ (<99%)'],
        ];

        DB::table('status')->insert($status);
    }
}
