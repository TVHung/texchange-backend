<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->delete();

        $status = [
            ['id' => 1, 'name' => 'Mới', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 2, 'name' => 'Cũ (99%)', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 3, 'name' => 'Cũ (<99%)', 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
        ];

        DB::table('statuses')->insert($status);
    }
}
