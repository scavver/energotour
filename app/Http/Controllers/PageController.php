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
}
