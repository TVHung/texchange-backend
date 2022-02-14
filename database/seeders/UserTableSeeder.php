<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $user = [
            ['id' => 101, 'name' => 'hungday', 'email' => 'hungday@gmail.com', 'password' => bcrypt('hungday'), 'is_admin' => 0, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 102, 'name' => 'hungne', 'email' => 'hungne@gmail.com', 'password' => bcrypt('hungne'), 'is_admin' => 0, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 103, 'name' => 'hungisme', 'email' => 'hungisme@gmail.com', 'password' => bcrypt('hungisme'), 'is_admin' => 0, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 104, 'name' => 'truongsang', 'email' => 'truongsang@gmail.com', 'password' => bcrypt('truongsang'), 'is_admin' => 0, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 105, 'name' => 'truonghoan', 'email' => 'truonghoan@gmail.com', 'password' => bcrypt('truonghoan'), 'is_admin' => 0, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 106, 'name' => 'truongtam', 'email' => 'truongtam@gmail.com', 'password' => bcrypt('truongtam'), 'is_admin' => 0, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
        ];

        DB::table('users')->insert($user);
    }
}
