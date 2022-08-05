<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\ProductImage::factory(50)->create();
        DB::table('product_images')->delete();
        $mobiles = array("https://kddi-h.assetsadobe3.com/is/image/content/dam/au-com/mobile/mb_img_58.jpg?scl=1", "https://media.vneconomy.vn/w800/images/upload/2021/12/29/iphone-13-pro-max.jpg",
                        "https://i.gadgets360cdn.com/products/large/moto-g52-db-709x800-1649827920.jpg", "https://m.media-amazon.com/images/I/71SvV17lq-L._SX425_.jpg", 
                        "https://m.economictimes.com/thumb/msid-71641818,width-1200,height-900,resizemode-4,imgsize-587039/getty.jpg", "https://cdn.cellphones.com.vn/media/wysiwyg/mobile/dien-thoai-10.jpg",
                        "https://images2nwck8c0zc.cdn.e2enetworks.net/sangeethaecommerce/product_image/product_list_page/img_20220429_d0c2b8559fad0203c6c49e79408b9d59.jpg", "https://images.samsung.com/is/image/samsung/p6pim/sg/2202/gallery/sg-galaxy-a53-5g-a536-sm-a536elbgxsp-thumb-531405024?$320_320_PNG$", 
                        "http://maccenter.vn/MacFamily/iPhone13-Pro-2021.jpg", "https://cdn2.cellphones.com.vn/358x/media/catalog/product/i/p/ip13-pro_2.jpg", "https://cellphones.com.vn/media/catalog/product/i/p/iphone_13-_pro-5_4_1_1_1_1.jpg", 
                    );
        $laptops = array("https://fptshop.com.vn/Uploads/Originals/2021/1/30/637476249023155191_asus-vivobook-a415-bac-800x800-dd.jpg", "https://cdn.tgdd.vn/Products/Images/44/281483/asus-vivobook-15-x1502za-i5-ej120w-600x600.jpg", 
                        "https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(5):fill(white)/fptshop.com.vn/Uploads/Originals/2021/1/12/637460615820979956_asus-vivobook-x515-bac-1.png", "https://bizweb.dktcdn.net/thumb/large/100/372/934/products/msi-modern-14-e20ded74-9a9b-4715-ace5-010d2f1fd75f.png?v=1651214131000", 
                        "https://cdn.tgdd.vn/Products/Images/44/269834/TimerThumb/asus-tuf-gaming-fx506hcb-i5-hn144w-(12).jpg", "https://salt.tikicdn.com/cache/280x280/ts/product/49/57/fe/6da5e3ab1800119727ac6e010d008955.jpg",
                        "https://salt.tikicdn.com/cache/200x200/ts/product/32/5c/62/082b2ab90f283a8aafdcc8aa4c3566cc.jpg", "https://laptophainam.com/wp-content/uploads/2022/01/macbook-cu-600x550.jpg", "https://digitrends.com.vn/wp-content/uploads/2018/11/laptop-apple.jpg",
                        "https://img.websosanh.vn/v10/users/keydes/images/t31flyt0c06ca/8-thuong-hieu-laptop-hang-dau-hien-nay-1.jpg");
        $pcs = array("https://fptshop.com.vn/uploads/originals/2022/1/9/637773648842825280_nen-lua-chon-tu-build-pc-hay-mua-pc-duoc-lap-rap-san-6.jpg", "https://khadao.vn/uploads/tiny_uploads/tin%20tuc/5%20C%E1%BA%A4U%20H%C3%8CNH%20PC/build-pc-gaming-duoi-1o-tr.jpg", 
                    "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR1JFGwoy-8i5h3YR_6_eFQP0OJ34I5Ggjf50nhrQD5fTZEK-8vF0GWVDMaFVs3yo1dWxU&usqp=CAU", "https://cdn.tgdd.vn/Files/2022/04/17/1426495/tu-van-chon-mua-may-tinh-pc-gaming-cau-hinh-khung-8-489x367.jpg",
                    "https://trangnguyencantho.com/wp-content/uploads/2020/10/bia-3-800x600.png", "https://anphat.com.vn/media/product/38721_2021_pba_banner_white_1080x1500.jpg", "https://fptshop.com.vn/uploads/originals/2022/2/11/637802151951055845_bi-a.png",
                    "https://photo2.tinhte.vn/data/attachment-files/2021/07/5538850_techzones-chon-linh-kien-pc-nhu-the-nao-de-tu-build-pc-de-nhat.png", "https://anphatcomputer.vn/img/image/tin-tuc/956/top-3-mau-may-tinh-choi-game-duoi-10-trieu-hot-nhat-nam-2020-11.jpg");

        $productMobiles = [];
        for ($x = 101; $x <= 400; $x++) {
            $dataItem1 = [
                'id' => $x,
                'product_id'=> $x,
                'is_banner'=> 1,
                'image_url'=>$mobiles[array_rand($mobiles)],
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ];
            array_push($productMobiles, $dataItem1);
        }
        
        $productLaptops = [];
        for ($x = 401; $x <= 700; $x++) {
            $dataItem2 = [
                'id' => $x,
                'product_id'=> $x,
                'is_banner'=> 1,
                'image_url'=>$laptops[array_rand($laptops)],
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ];
            array_push($productLaptops, $dataItem2);
        }
        
        $productPcs = [];
        for ($x = 701; $x <= 1000; $x++) {
            $dataItem3 = [
                'id' => $x,
                'product_id'=> $x,
                'is_banner'=> 1,
                'image_url'=>$pcs[array_rand($pcs)],
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ];
            array_push($productPcs, $dataItem3);
        }
        
        DB::table('product_images')->insert($productMobiles);
        DB::table('product_images')->insert($productLaptops);
        DB::table('product_images')->insert($productPcs);
    }
}
