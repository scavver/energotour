<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Http\Requests\StoreOrder;
use App\Mail\OrderCopy;
use App\Mail\OrderNotification;
use App\Order;
use App\Payer;
use App\Room;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function create()
    {
        return view('public.hotels.order');
    }

    public function store(StoreOrder $request)
    {
        $validated = $request->validated();

        $payer = Payer::create($validated['payer']);

        $order = Order::create([
            'arrival'   => $validated['arrival'],
            'departure' => $validated['departure'],
            'hotel_id'  => $validated['hotel_id'],
            'room_id'   => $validated['room_id'],
            'payer_id'  => $payer->id,
            'comment'   => $validated['comment'],
            'status'    => 'open',
        ]);

        foreach ($validated['tourists'] as $key => $tourist) {
            $validated['tourists'][$key]['date_of_birth'] = date("Y-m-d", strtotime($tourist['date_of_birth']));
        }

        $order->tourists()->createMany($validated['tourists']);

        # Extra data for email template

        $arrival = date("d.m.Y", strtotime($order->arrival));
        $departure = date("d.m.Y", strtotime($order->departure));
        $hotel = Hotel::find($validated['hotel_id'])->first();
        $room = Room::find($validated['room_id'])->first();
        $tourists = [];

        foreach ($validated['tourists'] as $key => $tourist) {
            $tourists[$key]['first_name'] = $tourist['first_name'];
            $tourists[$key]['last_name'] = $tourist['last_name'];
            $tourists[$key]['date_of_birth'] = date("d.m.Y", strtotime($tourist['date_of_birth']));
        }

        Mail::to(env('OFFICE_EMAIL'))->send(new OrderNotification($payer));
        Mail::to($payer['email'])->send(new OrderCopy($arrival, $departure, $hotel, $room, $payer, $order, $tourists));

        return response('Hello, Boss!', 200);
    }
}
