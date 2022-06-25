<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            ProfileSeeder::class,
            CategorySeeder::class,
            BrandSeeder::class,
            ProductSeeder::class,
            ProductMobileSeeder::class,
            ProductLaptopSeeder::class,
            ProductPcSeeder::class,
            ProductImageSeeder::class,
        ]);
    }
}
