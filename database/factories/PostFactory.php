<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

class PostFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //post common
            'user_id' => $this->faker->unique()->numberBetween(1, 30),
            'is_trade' => 0,
            'title' => $this->faker->name(),
            'name' => $this->faker->name(),
            'description' => $this->faker->name(),
            'ram' => $this->faker->randomElement([4, 8, 16, 32, 64, 128]),
            'video_url' => "https://res.cloudinary.com/trhung/video/upload/v1654967894/post_videos/biavpadizkdz1itd46a3.mp4",
            'status' => $this->faker->randomElement([0, 1, 2]),
            'price' => $this->faker->unique()->numberBetween(10000, 20000000),
            'address' => $this->faker->randomElement(["Phường Trần Phú, Thành phố Hà Giang, Tỉnh Hà Giang", "Xã Ngọc Hồi, Huyện Thanh Trì, Thành phố Hà Nội", "Xã Yên Phụ, Huyện Yên Phong, Tỉnh Bắc Ninh", "Phường Na Lay, Thị xã Mường Lay, Tỉnh Điện Biên"]),
            'public_status' => $this->faker->randomElement([0, 1]),
            'guarantee' => $this->faker->unique()->numberBetween(0, 24),
            'sold' => 0,
            'storage' => $this->faker->randomElement([8, 16, 32, 64, 128, 256, 512, 1024, 2048]),
            'is_block' => 0,
            
            //mobile
            // 'category_id' => 1,
            // 'brand_id' => $this->faker->unique()->numberBetween(1, 22),
            // 'color' => $this->faker->randomElement(['Xanh', 'Đỏ', 'Tím', 'Vàng', 'Lục', 'Lam', 'Tràm', 'Tím']),

            //laptop
            'category_id' => 2,
            'brand_id' => $this->faker->unique()->numberBetween(23, 37),
            'cpu' => $this->faker->randomElement(['i5 10400F', 'i5 7200u', 'i5 8250u', 'i9 9900k', 'i3 8100', 'AMD 5500u']),
            'gpu' => $this->faker->randomElement(['Intel gtx 3090', 'Intel gtx 3080', 'Intel gtx 3070', 'Intel gtx 3060', 'iIntel gtx 3050', 'AMD Rx590']),
            'storage_type' => $this->faker->randomElement([0, 1, 2]),
            'display_size' => $this->faker->randomElement([13.3, 14, 15.6, 16, 17]),

            //pc
            // 'category_id' => 3,
            // 'cpu' => $this->faker->randomElement(['i5 10400F', 'i5 7200u', 'i5 8250u', 'i9 9900k', 'i3 8100', 'AMD 5500u']),
            // 'gpu' => $this->faker->randomElement(['Intel gtx 3090', 'Intel gtx 3080', 'Intel gtx 3070', 'Intel gtx 3060', 'iIntel gtx 3050', 'AMD Rx590']),
            // 'storage_type' => $this->faker->randomElement([0, 1, 2]),
        ];
    }
}
