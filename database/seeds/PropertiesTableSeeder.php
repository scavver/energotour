<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('properties')->insert([
            [
                'class' => 'fab fa-hotjar',
                'title' => 'Горящее'
            ],
            [
                'class' => 'fas fa-swimming-pool',
                'title' => 'Бассейн'
            ],
            [
                'class' => 'fas fa-utensils',
                'title' => 'Ресторан'
            ],
            [
                'class' => 'fas fa-running',
                'title' => 'Спорт площадка'
            ],
            [
                'class' => 'fas fa-paw',
                'title' => 'Прием с животными'
            ],
            [
                'class' => 'fas fa-parking',
                'title' => 'Паркинг'
            ],
            [
                'class' => 'fas fa-child',
                'title' => 'Семейный отдых'
            ],
            [
                'class' => 'fas fa-wifi',
                'title' => 'Wi-Fi'
            ],
            [
                'class' => 'fas fa-stethoscope',
                'title' => 'С лечением'
            ],
            [
                'class' => 'fas fa-umbrella-beach',
                'title' => 'Собственный пляж'
            ],
            [
                'class' => 'fas fa-dumbbell',
                'title' => 'Тренажерный зал'
            ],
            [
                'class' => 'fas fa-baseball-ball',
                'title' => 'Теннисный корт'
            ],
            [
                'class' => 'fas fa-spa',
                'title' => 'SPA'
            ],
            [
                'class' => 'fas fa-temperature-high',
                'title' => 'Сауна'
            ],
            [
                'class' => 'fas fa-tree',
                'title' => 'Парк'
            ],
        ]);
    }
}
