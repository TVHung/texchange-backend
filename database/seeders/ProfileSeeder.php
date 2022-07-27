<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Profile::factory(1)->create();
        DB::table('profiles')->delete();

        $profiles = [];
        for ($x = 101; $x <= 136; $x++) {
            $dataItem = [
                'id' => $x,
                'user_id'=> $x,
                'name'=> "username" . $x ,
                'sex'=> rand(1,3),
                'avatar_url'=> "https://thiepnhanai.com/wp-content/uploads/2021/05/hinh-anh-dai-dien-dep-1.jpg",
                'phone'=> "0383621309",
                'address'=> "Yên phụ, Yên phong, Bắc Ninh",
                'facebook_url'=> "https://www.facebook.com/hung.tv99/",
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ];
            array_push($profiles, $dataItem);
        }

        DB::table('profiles')->insert($profiles);
    }
}
