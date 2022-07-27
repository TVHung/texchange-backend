<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductMobileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_mobiles')->delete();

        $products = [];
        $colors = array("Đỏ","Xanh","Vàng","Xám","Nâu","Đen","Trắng","Tím","Hồng","Cam");
        $pins = array(500, 1000, 2000, 3000, 4000, 5000, 6000);

        for ($x = 101; $x <= 200; $x++) {
            $dataItem = [
                'id' => $x,
                'product_id'=> $x,
                'color'=> $colors[array_rand($colors)],
                'brand_id'=> rand(1, 22),
                'pin' => $pins[array_rand($pins)],
                'resolution' => rand(1, 6),
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ];
            array_push($products, $dataItem);
        }

        DB::table('product_mobiles')->insert($products);
    }
}
