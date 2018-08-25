<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Order;
class OrderController extends Controller
{
    public function getListOrders()
    {
    	$order = Order::all();
    	return view('admin.pages.order.list',$order);
    }
}
