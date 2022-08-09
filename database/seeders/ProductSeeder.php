<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Product::factory(5)->create();
        DB::table('products')->delete();

        $nameMobiles = ['IPhone 13', 'Iphone 12', 'Iphone xs max', 'Iphone 11', 'Iphone x', 'Iphone 8', 'Iphone 7', 'Iphone 6',
                        'Samsung galaxy s6', 'Samsung galaxy s7', 'Samsung galaxy s8', 'Samsung galaxy s9', 'Samsung galaxy s10', 'Samsung galaxy s20', 'Samsung galaxy s21', 'Samsung galaxy s22',
                        'Xiaomi mi 6', 'Xiaomi mi 7', 'Xiaomi mi 8', 'Xiaomi mi 9', 'Xiaomi mi 10', 'Xiaomi mi 11', 'Xiaomi mi 12', 'Poco phone 5g',
                        'Oppo find x', 'Oppo zeno 4', 'Oppo zeno 5', 'Oppo zeno 6', 'Oppo zeno 7', 'Oppo A5g',
                        'Huawei p10', 'Huawei p20', 'Huawei p30', 'Huawei p40'];
        $nameLaptops = ['Macbook pro 2015', 'Macbook pro 2016', 'Macbook pro 2017', 'Macbook pro 2018', 'Macbook pro 2019', 'Macbook pro 2020', 'Macbook pro M1', 'Macbook pro', 'Macbook air M1', 'Macbook air',
                        'Dell xps 9510', 'Dell xps 9520', 'Dell xps 9530', 'Dell xps 9540', 'Dell xps 9550', 'Dell xps 9560', 'Dell xps 9570', 'Dell voltro 3568', 'Dell voltro 3567', 'Dell latitute', 'Dell xps',
                        'Asus zenbook', 'Asus zenbook', 'Lenovo', 'LG', 'Hp', 'Acer'];
        $namePcs = ['Pc chơi game', 'Pc học tập', 'Pc giải trí', 'Pc nhu cầu cơ bản', 'Pc chơi game fps', 'Pc'];

        $titles = ['Bán hàng uy tín chất lượng', 'Bán sản phẩm mới', 'Uy tín đặt lên hàng đầu', 'Đổi trả trong 30 ngày', 'Sản phẩm cam kết chưa qua sửa chữa', 'Sản phẩm gần như mới'];
        $descriptions = [
            'Chúng tôi cam kết:
            - Chỉ bán máy nguyên zin chính hãng, máy đẹp
            - Nói không với hàng giả, hàng nhái.
            - Hoàn lại tiền 10 lần nếu phát hiện hàng giả hàng nhái .
            - Chế độ bảo hành #UY_TÍN . Không gây khó khăn hay đổi lỗi cho khách hàng trong trường',
            'HẾ ĐỘ BẢO HÀNH VÀ ĐỔI TRẢ:
            - Bảo hành 12 Tháng Phần Cứng
            - Đổi mới 15 ngày đối với máy cũ ( Miễn phí, không hạn chế số lần đổi ).
            - Dán cường lực miễn phí 12 tháng.',
            'THỦ TỤC MUA TRẢ GÓP CẦN: 
            - CMND + GPLX( hoặc SHK). - Không cần chứng minh thu nhập.
            - Không giữ lại giấy tờ gốc.
            - Áp dụng toàn quốc từ 18 tuổi trở lên.
            - Thời gian xét duyệt nhanh (10 - 20phút).'
        ];
        $addresses = ['Xã Yên Phụ, Huyện Yên Phong, Tỉnh Bắc Ninh', 'Xã Phúc Lộc, Huyện Ba Bể, Tỉnh Bắc Kạn', 'Phường Phan Chu Trinh, Quận Hoàn Kiếm, Thành phố Hà Nội', 'Xã Sủng Trái, Huyện Đồng Văn, Tỉnh Hà Giang',
                        'Xã Sen Thượng, Huyện Mường Nhé, Tỉnh Điện Biên', 'Xã Tả Thàng, Huyện Mường Khương, Tỉnh Lào Cai', 'Xã Nam Cao, Huyện Bảo Lâm, Tỉnh Cao Bằng', 'Xã La Pan Tẩn, Huyện Mường Khương, Tỉnh Lào Cai'];

        $products = [];

        for ($x = 101; $x <= 1000; $x++) {
            $dataItem = [
                'id' => $x,
                'user_id'=> rand(101, 136),
                'is_trade'=> rand(0,1),
                'title'=> $titles[array_rand($titles)],
                'category_id'=> 1,
                'name'=> $nameMobiles[array_rand($nameMobiles)],
                'description'=> $descriptions[array_rand($descriptions)],
                'ram'=> rand(0, 12),
                'storage'=> 128,
                'status'=> rand(1,3),
                'price'=> rand(0, 15000000),
                'address'=> $addresses[array_rand($addresses)],
                'video_url'=> "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4",
                'public_status'=> rand(0,1),
                'guarantee'=> rand(0,24),
                'sold' => rand(0,1),
                'is_block' => 0,
                'view' => 0,
                'command' => rand(1,3),
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ];
            array_push($products, $dataItem);
        }

        for ($x = 1001; $x <= 2000; $x++) {
            $dataItem = [
                'id' => $x,
                'user_id'=> rand(101, 136),
                'is_trade'=> rand(0,1),
                'title'=> $titles[array_rand($titles)],
                'category_id'=> 2,
                'name'=> $nameLaptops[array_rand($nameLaptops)],
                'description'=> $descriptions[array_rand($descriptions)],
                'ram'=> rand(0, 12),
                'storage'=> 128,
                'status'=> rand(1,3),
                'price'=> rand(0, 25000000),
                'address'=> $addresses[array_rand($addresses)],
                'video_url'=> "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4",
                'public_status'=> rand(0,1),
                'guarantee'=> rand(0,24),
                'sold' => rand(0,1),
                'is_block' => 0,
                'view' => 0,
                'command' => rand(4,9),
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ];
            array_push($products, $dataItem);
        }

        for ($x = 2001; $x <= 3000; $x++) {
            $dataItem = [
                'id' => $x,
                'user_id'=> rand(101, 136),
                'is_trade'=> rand(0,1),
                'title'=> $titles[array_rand($titles)],
                'category_id'=> 3,
                'name'=>  $namePcs[array_rand($namePcs)],
                'description'=> $descriptions[array_rand($descriptions)],
                'ram'=> rand(0, 12),
                'storage'=> 128,
                'status'=> rand(1,3),
                'price'=> rand(0, 25000000),
                'address'=> $addresses[array_rand($addresses)],
                'video_url'=> "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4",
                'public_status'=> rand(0,1),
                'guarantee'=> rand(0,24),
                'sold' => rand(0,1),
                'is_block' => 0,
                'view' => 0,
                'command' => rand(10,15),
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ];
            array_push($products, $dataItem);
        }

        DB::table('products')->insert($products);
    }
}
