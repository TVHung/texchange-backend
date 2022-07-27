<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ProductWishList;

class ProductWishListFactory extends Factory
{
    protected $model = ProductWishList::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->unique()->numberBetween(101, 118),
            'product_id' => $this->faker->unique()->numberBetween(101, 160),
        ];
    }
}
