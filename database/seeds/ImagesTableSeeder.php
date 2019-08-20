<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            [
                'alt' => 'Большая Ялта',
                'path' => 'images/cat-1.png',
                'gallery_id' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'alt' => 'Большая Алушта',
                'path' => 'images/cat-2.png',
                'gallery_id' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'alt' => 'Евпатория',
                'path' => 'images/cat-3.png',
                'gallery_id' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'alt' => 'Саки',
                'path' => 'images/cat-4.png',
                'gallery_id' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'alt' => 'Санаторий Нижняя Ореанда в Ялте',
                'path' => 'images/slide-1.png',
                'gallery_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'alt' => 'Санаторий Полтава Крым (Саки)',
                'path' => 'images/slide-2.png',
                'gallery_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'alt' => 'Отель Сказка в Алуште',
                'path' => 'images/slide-3.png',
                'gallery_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
