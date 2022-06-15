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
            BrandSeeder::class,
            CategorySeeder::class,
            // ProductSeeder::class,
            // ProductImageSeeder::class,
        ]);
    }
}
