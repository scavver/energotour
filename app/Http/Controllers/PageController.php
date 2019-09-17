<?php

namespace App\Http\Controllers;

use App\Category;
use App\Page;
use App\Place;
use Illuminate\Http\Request;
use App\Gallery;

class PageController extends Controller
{
    // Главная страница
    public function home()
    {
        $carouselImages = Gallery::find(1)->images;

        $categories = Category::all();

        $hot = Place::whereHas('properties', function($q) { $q->where('id', 1); })->take(3)->get();

        $pool = Place::whereHas('properties', function($q) { $q->where('id', 2); })->where('id', '<>', 1)->take(3)->get();

        return view('public.home', ['carouselImages' => $carouselImages, 'categories' => $categories, 'hot' => $hot, 'pool' => $pool]);
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
}
