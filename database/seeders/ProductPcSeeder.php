<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductPcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_pcs')->delete();
        $cpus = array("Intel core i3", "Intel core i5", "Intel core i7", "Intel core i9", "AMD ryzen 3", "AMD ryzen 5", "AMD ryzen 7", "AMD ryzen 9");
        $gpus = array("GTX 1030", "GTX 1050", "GTX 1060", "GTX 1070", "GTX 1080", "RTX 2030", "RTX 2050", "RTX 2060", "RTX 2070", "RTX 2080", "RTX 3030", "RTX 3050", "RTX 3060", "RTX 3070", "RTX 3080");
        $displays = array(10, 11, 12, 13.3, 14, 15.6, 16, 17.3);

        $products = [];
        for ($x = 301; $x <= 400; $x++) {
            $dataItem = [
                'id' => $x,
                'product_id'=> $x,
                'cpu'=> $cpus[array_rand($cpus)],
                'gpu'=> $gpus[array_rand($gpus)],
                'storage_type'=> rand(1,3),
                'display_size'=> $displays[array_rand($displays)],
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ];
            array_push($products, $dataItem);
        }
       
        DB::table('product_pcs')->insert($products);
    }
}
