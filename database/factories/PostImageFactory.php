<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_id' => $this->faker->unique()->numberBetween(1, 201),
            'is_banner' => $this->faker->randomElement([0, 1]),
            'image_url' => $this->faker->randomElement(['https://res.cloudinary.com/trhung/image/upload/v1646040041/iz06jcdxlojus06akbcv.jpg', 'https://res.cloudinary.com/trhung/image/upload/v1646040042/asoxmeb2nsdbbefja9ny.jpg', 'https://res.cloudinary.com/trhung/image/upload/v1646040042/mfcvrjbpynm3ml3idwm5.jpg', 'https://res.cloudinary.com/trhung/image/upload/v1646040582/unrkrfugucvhblfa2bwy.jpg', 'https://res.cloudinary.com/trhung/image/upload/v1646040582/r1luzst1rhcp2rgj3i71.jpg', 'https://res.cloudinary.com/trhung/image/upload/v1646040582/r1luzst1rhcp2rgj3i71.jpg', 'https://res.cloudinary.com/trhung/image/upload/v1652085553/lgmh5kxhjcyh5alymomd.png', 'https://res.cloudinary.com/trhung/image/upload/v1652085553/lgmh5kxhjcyh5alymomd.png', 'https://res.cloudinary.com/trhung/image/upload/v1652088754/ai2f9w7r9ov1onsuan7b.png']),
        ];
    }
}
