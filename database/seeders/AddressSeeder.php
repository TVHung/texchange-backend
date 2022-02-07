<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('address')->delete();

        $address = [
            ['id' => 1, 'city' => 'Hà nội', 'district' => 'Hai bà trưng', 'ward' => 'Minh khai'],
            ['id' => 2, 'city' => 'Bắc ninh', 'district' => 'Yên phong', 'ward' => 'Yên phụ'],
        ];

        DB::table('address')->insert($address);
    }
}
