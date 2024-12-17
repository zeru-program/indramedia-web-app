<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function indexProduct() {
        return view("products.home");
    }
    
    public function indexProductIndramedia() {
        return view("products.indramedia");
    }
    
    public function indexProductIndramediaDetail($id) {
        return view("products.indramedia-detail", ['id' => $id]);
    }
    
    public function indexProductEndez() {
        return view("products.endez");
    }
    
    public function indexPostCheckout(Request $request) {
        $order_product = $request->input('order_product');
        $order_price = $request->input('order_price');
        $order_qty = $request->input('order_qty');
        $order_name = $request->input('order_name');
        $order_phone = $request->input('order_phone');
        $order_note = $request->input('order_note');
        $order_files = $request->input('order_files');
        $order_delivery = $request->input('order_delivery');
        $order_payment = $request->input('order_payment');
        $shipping = 0;
        
        return view("products.checkout", [
            'order_product' => $order_product,
            'order_price' => $order_price,
            'order_qty' => $order_qty,
            'order_name' => $order_name,
            'order_phone' => $order_phone,
            'order_note' => $order_note,
            'order_files' => $order_files,
            'order_delivery' => $order_delivery,
            'order_payment' => $order_payment,
            'shipping' => $shipping,
            ]);
    }
    
    public function storeCheckout(Request $request) {
        $order_id = 0;
        $order_product = $request->input('order_product');
        
        
        return view("orders.detail", ["order_product" => $order_product]);
       /* return redirect()->route('order-detail', $order_id)->with('success', 'Order berhasil dibuat !');*/
    }
   
    public function indexCheckout() {
        return redirect()->route('home');
    }
}
