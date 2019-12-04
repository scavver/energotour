<?php

namespace App\Http\Controllers\Management;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Document;
use App\Hotel;
use App\Price;
use App\Image;

class PriceController extends Controller
{
    // Список всех прайсов
    public function index()
    {
        $prices = Price::paginate(15);

        return view('management.prices.index', ['prices' => $prices]);
    }

    // Страница добавления нового прайса
    public function create()
    {
        $hotels = Hotel::all();

        return view('management.prices.create', ['hotels' => $hotels]);
    }

    // Сохранение прайса
    public function store(Request $request)
    {
        // Валидация запроса
        $request->validate([
            'min_price' => 'required|integer',
            'hotel_id' => 'required|integer',
            'file' => 'nullable|mimes:jpeg,png,gif,pdf',
        ]);

        // Добавляем запись в таблицу `prices`
        $price = Price::create($request->only([
            'min_price',
            'hotel_id'
        ]));

        // Если в запросе есть провалидированный файл
        if($request->hasFile('file')) {
            // Проверяем MIME тип файла
            if($request->file->getMimeType() == 'application/pdf') {
                $file_path = $request->file->store('docs'); // Сохраняем документ в хранилище получаем в ответ путь

                $document = new Document();                 // Новая запись в таблицу с документами
                $document->path = $file_path;               // Передаем путь
                $document->documentable_id = $price->id;    // Полиморфное отношение
                $document->documentable_type = 'App\Price'; // Полиморфное отношение
                $document->save();
            }
            // Если не пдф, то очевидно изображение
            else {
                $file_path = $request->file->store('images');   // Сохраняем изображение в хранилище получаем в ответ путь

                $image = new Image();                           // Новая запись в таблицу с изображениями
                $image->path = $file_path;                      // Передаем путь
                $image->imageable_id = $price->id;              // Полиморфное отношение
                $image->imageable_type = 'App\Price';           // Полиморфное отношение
                $image->save();
            }
        }

        return redirect(route('prices.index'))->with('success', 'Цены добавлены!');
    }

    // Страница редактирования прайса
    public function edit($id)
    {
        $prices = Price::all()->where('id', $id);
        $hotels = Hotel::all();

        return view('management.prices.edit', ['prices' => $prices, 'hotels' => $hotels]);
    }

    // Обновление прайса
    public function update(Request $request, $id)
    {
        $request->validate([
            'previous'  => 'string',
            'min_price' => 'required|integer',
            'hotel_id'  => 'required|integer',
            'file'     => 'nullable|mimes:jpeg,png,gif,pdf',
        ]);

        $price = Price::find($id);

        $price->update($request->only([
            'min_price',
            'hotel_id'
        ]));

        // TODO: Девочки, это какой-то шикардосик

        // Если в запросе есть провалидированный файл
        if($request->hasFile('file')) {
            // Проверяем MIME тип файла
            if ($request->file->getMimeType() == 'application/pdf') {
                // Проверка был ли у пдф предшественник
                if(!empty(Document::where('documentable_id', $price->id)->where('documentable_type', 'App\Price')->first())) {
                    // Находим старый документ в таблице
                    $old_document = Document::where('documentable_id', $price->id)->where('documentable_type', 'App\Price')->first();
                    Storage::delete($old_document->path);           // Удаляем его файл из хранилища

                    $file_path = $request->file->store('docs');     // Сохраняем документ в хранилище получаем в ответ путь
                    $old_document->path = $file_path;               // Заменяем путь на новый
                    $old_document->save();                          // Сохраняем запись
                }
                // Или картинка
                elseif (Image::where('imageable_id', $price->id)->where('imageable_type', 'App\Price')->first()) {
                    // Находим и удаляем старое изоражение в таблице
                    $old_image = Image::where('imageable_id', $price->id)->where('imageable_type', 'App\Price')->first();
                    Storage::delete($old_image->path);              // Удаляем его файл из хранилища
                    $old_image->delete();

                    $file_path = $request->file->store('docs');     // Сохраняем документ в хранилище получаем в ответ путь

                    $document = new Document();                     // Новая запись в таблицу с документами
                    $document->path = $file_path;                   // Передаем путь
                    $document->documentable_id = $price->id;        // Полиморфное отношение
                    $document->documentable_type = 'App\Price';     // Полиморфное отношение
                    $document->save();
                }
                // Или не было ничего
                else {
                    $file_path = $request->file->store('docs'); // Сохраняем документ в хранилище получаем в ответ путь

                    $document = new Document();                 // Новая запись в таблицу с документами
                    $document->path = $file_path;               // Передаем путь
                    $document->documentable_id = $price->id;    // Полиморфное отношение
                    $document->documentable_type = 'App\Price'; // Полиморфное отношение
                    $document->save();
                }
            }
            // Если не пдф, то очевидно изображение
            else {
                // Проверка был ли у изображения предшественник
                if (Image::where('imageable_id', $price->id)->where('imageable_type', 'App\Price')->first()) {
                    // Находим старое изоражение в таблице
                    $old_image = Image::where('imageable_id', $price->id)->where('imageable_type', 'App\Price')->first();
                    Storage::delete($old_image->path);              // Удаляем его файл из хранилища

                    $file_path = $request->file->store('images');   // Сохраняем изображение в хранилище получаем в ответ путь
                    $old_image->path = $file_path;                  // Заменяем путь на новый
                    $old_image->save();                             // Сохраняем запись
                }
                // Или документ
                elseif(!empty(Document::where('documentable_id', $price->id)->where('documentable_type', 'App\Price')->first())) {
                    // Находим старый документ в таблице
                    $old_document = Document::where('documentable_id', $price->id)->where('documentable_type', 'App\Price')->first();
                    Storage::delete($old_document->path);           // Удаляем его файл из хранилища
                    $old_document->delete();

                    $file_path = $request->file->store('images');   // Сохраняем документ в хранилище получаем в ответ путь

                    $document = new Image();                        // Новая запись в таблицу с документами
                    $document->path = $file_path;                   // Передаем путь
                    $document->imageable_id = $price->id;           // Полиморфное отношение
                    $document->imageable_type = 'App\Price';        // Полиморфное отношение
                    $document->save();
                }
                // Или не было ничего
                else {
                    $file_path = $request->file->store('images'); // Сохраняем документ в хранилище получаем в ответ путь

                    $document = new Image();                 // Новая запись в таблицу с документами
                    $document->path = $file_path;               // Передаем путь
                    $document->imageable_id = $price->id;    // Полиморфное отношение
                    $document->imageable_type = 'App\Price'; // Полиморфное отношение
                    $document->save();
                }
            }
        }

        $previous = $request->previous; // Путь из скрытого инпута к предыдущей странице

        return redirect(url($previous))->with('success', 'Цены обновлены.');
    }

    // Удаление прайса
    public function destroy($id)
    {
        // Ищем прайс в таблице и удаляем запись
        $price = Price::find($id);

        // Если есть пдф - удаляем
        if(!empty(Document::where('documentable_id', $price->id)->where('documentable_type', 'App\Price')->first())) {
            $old_document = Document::where('documentable_id', $price->id)->where('documentable_type', 'App\Price')->first();
            Storage::delete($old_document->path);           // Удаляем его файл из хранилища
            $old_document->delete();
        }
        // Если изображение - удаляем
        elseif (!empty(Image::where('imageable_id', $price->id)->where('imageable_type', 'App\Price')->first())) {
            $old_image = Image::where('imageable_id', $price->id)->where('imageable_type', 'App\Price')->first();
            Storage::delete($old_image->path);              // Удаляем его файл из хранилища
            $old_image->delete();
        }

        $price->delete();

        return redirect(route('prices.index'))->with('success', 'Цены удалены.');
    }
}
