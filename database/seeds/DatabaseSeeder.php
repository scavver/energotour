<?php

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
        $this->call(UsersTableSeeder::class);
        $this->call(PropertiesTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(GalleriesTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
    }
}
