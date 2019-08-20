<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Большая Ялта',
                'cover' => 'images/cat-1.png'
            ],
            [
                'name' => 'Большая Алушта',
                'cover' => 'images/cat-2.png'
            ],
            [
                'name' => 'Евпатория',
                'cover' => 'images/cat-3.png'
            ],
            [
                'name' => 'Саки',
                'cover' => 'images/cat-4.png'
            ]

        ]);
    }
}
