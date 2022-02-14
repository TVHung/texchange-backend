<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->delete();

        $address = [
            [
                'id' => 101, 
                'city' => 'Hà nội', 
                'district' => 'Hai bà trưng', 
                'ward' => 'Minh khai',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 102, 
                'city' => 'Bắc ninh', 
                'district' => 'Yên phong', 
                'ward' => 'Yên phụ',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        DB::table('addresses')->insert($address);
    }
}
