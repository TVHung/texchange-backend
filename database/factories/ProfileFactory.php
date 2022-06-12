<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 3,
            'name' => $this->faker->name(),
            'sex' => $this->faker->randomElement([0, 1, 2]),
            'avatar_url' => $this->faker->randomElement(['https://res.cloudinary.com/trhung/image/upload/v1654967943/bxcg3miur9wdtrb5uotf.jpg', 'https://res.cloudinary.com/trhung/image/upload/v1650219626/rvo0ufooowdf3ur0ltpf.jpg']),
            'phone' => $this->faker->numerify('##########'),
            'address' => $this->faker->randomElement(["Phường Trần Phú, Thành phố Hà Giang, Tỉnh Hà Giang", "Xã Ngọc Hồi, Huyện Thanh Trì, Thành phố Hà Nội", "Xã Yên Phụ, Huyện Yên Phong, Tỉnh Bắc Ninh", "Phường Na Lay, Thị xã Mường Lay, Tỉnh Điện Biên"]),
            'facebook_url' => $this->faker->randomElement(['fb.com/hung.tv99', 'instagram.com/trhung_isme']),
        ];
    }
}
