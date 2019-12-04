<?php

namespace App\Http\Controllers\Management;

use App\Gallery;
use App\Hotel;
use App\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    // Список всех комнат
    public function index()
    {
        $rooms = Room::paginate(15);

        return view('management.rooms.index', ['rooms' => $rooms]);
    }

    // Страница добавления новой комнаты
    public function create()
    {
        $hotels = Hotel::all();
        $galleries = Gallery::where('is_room', '=', '1')->get();

        return view('management.rooms.create', ['hotels' => $hotels, 'galleries' => $galleries]);
    }

    // Сохранение комнаты
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'hotel_id' => 'integer',
            'gallery_id' => 'nullable|integer',
            'number_of_rooms' => 'nullable|string',
            'category' => 'required|string',
            'view' => 'nullable|string',
            'number_of_hotels' => 'required|integer',
            'number_of_extra_hotels' => 'nullable|integer',
            'area' => 'nullable|string',
            'furniture' => 'nullable|string',
            'equipment' => 'nullable|string',
            'bathroom' => 'nullable|string',
            'service' => 'nullable|string'
        ]);

        $room = Room::create($request->only([
            'name',
            'hotel_id',
            'gallery_id',
            'number_of_rooms',
            'category',
            'view',
            'number_of_hotels',
            'number_of_extra_hotels',
            'area',
            'furniture',
            'equipment',
            'bathroom',
            'service'
        ]));

        return redirect(url('management/rooms'))->with('success', '🎉 Номер добавлен');
    }

    // Страница редактирования комнаты
    public function edit($id)
    {
        $room = Room::find($id);
        $hotels = Hotel::all();
        $galleries = Gallery::where('is_room', '=', '1')->get();

        return view('management.rooms.edit', ['room' => $room, 'hotels' => $hotels, 'galleries' => $galleries]);
    }

    // Обновление комнаты
    public function update(Request $request, $id)
    {
        $request->validate([
            'previous'                  => 'string',
            'name'                      => 'required|string',
            'hotel_id'                  => 'integer',
            'gallery_id'                => 'nullable|integer',
            'number_of_rooms'           => 'nullable|string',
            'category'                  => 'required|string',
            'view'                      => 'nullable|string',
            'number_of_hotels'          => 'required|integer',
            'number_of_extra_hotels'    => 'nullable|integer',
            'area'                      => 'nullable|string',
            'furniture'                 => 'nullable|string',
            'equipment'                 => 'nullable|string',
            'bathroom'                  => 'nullable|string',
            'service'                   => 'nullable|string'
        ]);

        $room = Room::find($id);

        $room->update($request->only([
            'name',
            'hotel_id',
            'gallery_id',
            'number_of_rooms',
            'category',
            'view',
            'number_of_hotels',
            'number_of_extra_hotels',
            'area',
            'furniture',
            'equipment',
            'bathroom',
            'service'
        ]));

        $previous = $request->previous;

        return redirect(url($previous))->with('success', '🎊 Номер обновлен');
    }

    // Удаление комнаты
    public function destroy($id)
    {
        $room = Room::find($id);

        $room->delete();

        return redirect(route('rooms.index'))->with('success', '🧹 Номер удален');
    }
}
