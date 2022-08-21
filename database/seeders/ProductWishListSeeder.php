<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductWishListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_wish_lists')->delete();
        // \App\Models\ProductWishList::factory(10)->create();
        $productWishList = [];
        for ($x = 101; $x <= 200; $x++) {
            $dataItem = [
                'id' => $x,
                'user_id'=> rand(101, 136),
                'product_id' => rand(101, 1000),
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ];
            array_push($productWishList, $dataItem);
        }

        for ($x = 1001; $x <= 1200; $x++) {
            $dataItem = [
                'id' => $x,
                'user_id'=> rand(101, 136),
                'product_id' => rand(1001, 2000),
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ];
            array_push($productWishList, $dataItem);
        }

        for ($x = 2001; $x <= 2200; $x++) {
            $dataItem = [
                'id' => $x,
                'user_id'=> rand(101, 136),
                'product_id' => rand(2001, 3000),
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            ];
            array_push($productWishList, $dataItem);
        }

        DB::table('product_wish_lists')->insert($productWishList);
    }
}
