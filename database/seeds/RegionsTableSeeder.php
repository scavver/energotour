<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
            [
                'name' => 'Большая Ялта',
            ],
            [
                'name' => 'Большая Алушта',
            ],
            [
                'name' => 'Евпатория',
            ],
            [
                'name' => 'Саки',
            ]

        ]);
    }
}
