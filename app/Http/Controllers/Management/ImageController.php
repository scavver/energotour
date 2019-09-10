<?php

namespace App\Http\Controllers\Management;


use Intervention\Image\Facades\Image as Intervention;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Gallery;
use App\Image;

class ImageController extends Controller
{
    // Сохранение изображения
    public function store(Request $request)
    {
        $galleryID = $request->galleryID;

        if (count($request->images)) {
            foreach ($request->images as $img) {
                // Сохранение и получение в ответ пути оригинального изображения
                $path = $img->store('images');

                // Нейминг путей оригинала и миниатюры
                $path_compressed = 'images/' . md5(time() . $path) . '.' . $img->extension();
                $path_sm = 'images/' . md5($path . time()) . '.' . $img->extension();

                // Кодируем оригинал в jpg с заданным качеством
                $compressed = Intervention::make($path)->encode('jpg', 40);
                $compressed->save($path_compressed);

                // Создание миниатюры
                $thumbnail_sm = Intervention::make($path)->fit(400, 267, function ($constraint) {
                    $constraint->upsize();
                });
                $thumbnail_sm->save($path_sm);

                $image = new Image();

                $image->path = $path;
                $image->path_compressed = $path_compressed;
                $image->path_sm = $path_sm;
                $image->gallery_id = $galleryID;

                $image->save();
            }
        }

        return response()->json([
            "message" => "Done"
        ]);
    }

    // Страница редактирования изображения
    public function edit($id)
    {
        $images = Image::all()->where('id', $id);
        $galleries = Gallery::all();

        return view('management.images.edit', ['images' => $images, 'galleries' => $galleries]);
    }

    // Обновление изображения
    public function update(Request $request, $id)
    {
        $galleryID = $request->gallery_id;

        $image = Image::find($id);

        $image->update($request->all());

        return redirect(url('management/galleries/' . $galleryID . '/edit'))->with('success', 'Изображение обновлено.');
    }

    // Удаление изображения
    public function destroy($id)
    {
        $image = Image::find($id);

        Storage::delete($image->path);
        Storage::delete($image->path_compressed);
        Storage::delete($image->path_sm);

        $image->delete();

        return redirect()->back()->with('success', 'Изображение и миниатюра удалены.');
    }
}
