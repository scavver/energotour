<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(20);

        return view('management.orders.index', ['orders' => $orders]);
    }

    public function show($id)
    {
        $order = Order::find($id);

        return view('management.orders.show', ['order' => $order]);
    }

    public function destroy($id)
    {
        $order = Order::find($id);

        $order->delete();

        return redirect(route('orders.index'))->with('success', '🧹 Заявка удалена.');
    }
}
