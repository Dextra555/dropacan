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


 
  public function updateOrderStatus(Request $request)
  {
      // Validate incoming request data if needed

      // Get data from the request
      $orderId = $request->input('orderId');
      $newStatus = $request->input('newStatus');

      $order = Order::find($orderId);
      if ($order) {
          $order->status = $newStatus;
          $order->save();
          return response()->json(['success' => true, 'message' => 'Order status updated to successfully']);
      } else {
          return response()->json(['success' => false, 'message' => 'Order not found']);
      }
  }
  
  }


 