<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getOrders()
    {
        $order=Order::get();
        return view('backEnd.order.orders')->with(['orders'=>$order]);
//        return "Hello";
    }

    public function getOrderDeliver($id)
    {
        $order=Order::whereId($id)->first();
        $order->status=true;
        $order->update();

        return redirect()->back();
    }
}
