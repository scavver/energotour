<?php

namespace App\Http\Controllers;

use App\Region;
use App\Gallery;
use App\Hotel;
use App\Page;

class PageController extends Controller
{
    // Главная страница
    public function home()
    {
        $slides = Gallery::find(1)->images;
        $regions = Region::take(4)->get();
        $popular = Hotel::whereHas('properties', function($q) { $q->where('id', 1); })->take(3)->get();

        $sanatorium = Hotel::whereHas('region', function($q) { $q->where('id', 1); })->get();
        $pool = Hotel::whereHas('properties', function($q) { $q->where('id', 2); })->where('id', '<>', 1)->get();
        $family = Hotel::whereHas('properties', function($q) { $q->where('id', 7); })->where('id', '<>', 1)->get();

        return view('public.home', ['slides' => $slides, 'regions' => $regions, 'popular' => $popular, 'sanatorium' => $sanatorium, 'pool' => $pool, 'family' => $family]);
    }

    // Кастомные страницы (Контакты, О компании, и т.д.)
    public function page($slug)
    {
        // Получаем страницу с переданным слагом - /pages/[slug]
        $page = Page::where('slug', $slug)->first();

        // Если в таблице нету записи с таким слагом - кидаем 404 ошибку
        if (empty($page)) {
            abort(404);
        }

        // Возвращаем стандартный вид для отображения контента страницы ($page->content)
        return view('public.page', ['page' => $page]);
    }

    // Страница "Как забронировать тур"
    public function howToBooking()
    {
        return view('public.pages.howToBooking');
    }

    // Страница "Как оплатить"
    public function howToPay()
    {
        return view('public.pages.howToPay');
    }

    // Страница "Вопрос ответ"
    public function faq()
    {
        return view('public.pages.faq');
    }

    // Страница "История компании"
    public function history()
    {
        $galleries = Gallery::whereBetween('id', [52, 62])->get();

        return view('public.pages.history', ['galleries' => $galleries]);
    }

    // Страница "Контакты"
    public function contacts()
    {
        return view('public.pages.contacts');
    }

    // Страница "Регистрационные документы"
    public function documents()
    {
        return view('public.pages.documents');
    }

    // Страница "Экскурсии"
    public function excursions()
    {
        return view('public.pages.excursions');
    }

    // Страница "Авиабилеты"
    public function avia()
    {
        return view('public.pages.avia');
    }
}
