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
        // \App\Models\User::factory(30)->create();
        DB::table('users')->delete();

        $user = [
            ['id' => 101, 'name' => 'hungday', 'email' => 'hungday@gmail.com', 'password' => bcrypt('hungday'), 'is_admin' => 1, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 102, 'name' => 'truonghungvatvo', 'email' => 'truonghungvatvo@gmail.com', 'password' => bcrypt('truonghungvatvo'), 'is_admin' => 1, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 103, 'name' => 'hungisme', 'email' => 'hungisme@gmail.com', 'password' => bcrypt('hungisme'), 'is_admin' => 0, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 104, 'name' => 'truongsang', 'email' => 'truongsang@gmail.com', 'password' => bcrypt('truongsang'), 'is_admin' => 0, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 105, 'name' => 'truonghoan', 'email' => 'truonghoan@gmail.com', 'password' => bcrypt('truonghoan'), 'is_admin' => 0, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 106, 'name' => 'truongtam', 'email' => 'truongtam@gmail.com', 'password' => bcrypt('truongtam'), 'is_admin' => 0, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 107, 'name' => 'hungday', 'email' => 'hungday1@gmail.com', 'password' => bcrypt('hungday'), 'is_admin' => 0, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 108, 'name' => 'hungne', 'email' => 'hungne1@gmail.com', 'password' => bcrypt('hungne'), 'is_admin' => 0, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 109, 'name' => 'hungisme', 'email' => 'hungisme1@gmail.com', 'password' => bcrypt('hungisme'), 'is_admin' => 0, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 110, 'name' => 'truongsang', 'email' => 'truongsang1@gmail.com', 'password' => bcrypt('truongsang'), 'is_admin' => 0, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 111, 'name' => 'truonghoan', 'email' => 'truonghoan1@gmail.com', 'password' => bcrypt('truonghoan'), 'is_admin' => 0, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 112, 'name' => 'truongtam', 'email' => 'truongtam1@gmail.com', 'password' => bcrypt('truongtam'), 'is_admin' => 0, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 113, 'name' => 'hungday', 'email' => 'hungday2@gmail.com', 'password' => bcrypt('hungday'), 'is_admin' => 0, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 114, 'name' => 'hungne', 'email' => 'hungne2@gmail.com', 'password' => bcrypt('hungne'), 'is_admin' => 0, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 115, 'name' => 'hungisme', 'email' => 'hungisme2@gmail.com', 'password' => bcrypt('hungisme'), 'is_admin' => 0, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 116, 'name' => 'truongsang', 'email' => 'truongsang2@gmail.com', 'password' => bcrypt('truongsang'), 'is_admin' => 0, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 117, 'name' => 'truonghoan', 'email' => 'truonghoan2@gmail.com', 'password' => bcrypt('truonghoan'), 'is_admin' => 0, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 118, 'name' => 'truongtam', 'email' => 'truongtam2@gmail.com', 'password' => bcrypt('truongtam'), 'is_admin' => 0, 'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')],
        ];

        DB::table('users')->insert($user);
    }
}
