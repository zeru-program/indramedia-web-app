<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function orderDetail(Request $request) {
        return view("orders.detail");
    }
}
