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
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserTableSeeder::class,
            ProfileSeeder::class,
            BrandSeeder::class,
            StatusSeeder::class,
            AddressSeeder::class,
            CategorySeeder::class,
            StorageSeeder::class,
            PostSeeder::class,
            PostImageSeeder::class,
            PostMobileSeeder::class,
            PostLaptopSeeder::class,
            PostPcSeeder::class,
        ]);
    }
}
