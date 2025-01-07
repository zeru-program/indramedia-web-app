<?php

namespace App\Http\Controllers;

use App\Models\FilesOrder;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function orderDetail(Request $request, $id)
    {
        $data = Orders::where('order_id', $id)->first();
    
        if (!$data) {
            abort(404, 'Order not found');
        }
    
        $data2 = Products::where('sku', $data->product_sku)->first();
    
        if (!$data2) {
            abort(404, 'Product not found');
        }
    
        $file_order = FilesOrder::where('order_id', $data->order_id)->first();
    
        // if (!$file_order) {
        //     abort(404, 'File order not found');
        // }
    
        return view('orders.detail', compact('data', 'data2', 'file_order'));
    }    
}
