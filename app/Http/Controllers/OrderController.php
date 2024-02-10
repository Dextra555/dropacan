<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;


class OrderController extends Controller
{
    //
  function Orders() {

    $orders = Order::all();
    return view('pages.orders.orderslist', compact('orders'));
  }
}
