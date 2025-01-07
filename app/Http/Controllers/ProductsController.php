<?php

namespace App\Http\Controllers;

use App\Models\FilesOrder;
use App\Models\Orders;
use App\Models\Products;
use App\Models\ProductsType;
use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    public function indexProduct() {
        return view("products.home");
    }
    
    public function indexProductIndramedia(Request $request) {
        $query = $request->get('q');
        $type = $request->get('type');
        $category = $request->get('category');
        $harga_awal = $request->get('harga_awal');
        $harga_akhir = $request->get('harga_akhir');    

        // $findType = ProductsType::where('type_id', $type)->first;

        // Ambil data berdasarkan pencarian atau data default
        $data = Products::where('brand', 'indramedia')
        ->where('status', 'active')
        ->where('stock', '>', '0')
        ->with('promo')
        ->when($query, function ($queryBuilder) use ($query) {
            $queryBuilder->where(function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%");
            });
        })
        ->when($type, function ($queryBuilder) use ($type) {
            $queryBuilder->where('type', 'LIKE', "%{$type}%");
        })
        ->when($category, function ($queryBuilder) use ($category) {
            $queryBuilder->where('category', 'LIKE', "%{$category}%");
        })
        ->when($harga_awal, function ($queryBuilder) use ($harga_awal) {
            $queryBuilder->where('price', '>=', $harga_awal);
        })
        ->when($harga_akhir, function ($queryBuilder) use ($harga_akhir) {
            $queryBuilder->where('price', '<=', $harga_akhir);
        })
        ->orderBy('created_at', 'desc')
        ->paginate(20);

        // dd($data);
        if ($request->ajax()) {
            $morePages = count($data) == 10;
            return response()->json([
                'items' => $data->map(function ($item) {
                    return [
                        'id' => $item->id,
                        'sku' => $item->sku,
                        'name' => $item->name,
                        'brand' => $item->brand,
                        'star' => $item->star,
                        'reviews' => $item->reviews,
                        'image_path' => $item->image_path,
                        'price' => $item->price,
                        'status' => $item->status,
                        'is_promo' => $item->is_promo,
                        'promo' => $item->promo ? [
                            'percentage' => $item->promo->percentage,
                            'initial' => $item->promo->initial_price,
                            'promo' => $item->promo->promo_price,
                            'description' => $item->promo->description,
                            'start_date' => $item->promo->start_date,
                            'end_date' => $item->promo->end_date,
                            'status' => $item->promo->status,
                        ] : null
                    ];
                }),
                'pagination' => [
                    'more' => $morePages
                ]
            ]);
        }
        // dd($data);

        return view("products.indramedia", [
            'data' => $data,
        ]);
    }  
    
    public function indexProductIndramediaDetail($id) {
        // dd($id);
        if (!$id) {
            return redirect()->back();
        }

        $data = Products::where('name', $id)->with('promo')->first();

        // dd($query);

        return view("products.indramedia-detail", compact('data'));
    }
    
    public function indexProductIndramediaCreate(Request $request) {
        // dd($request->request);
        // Validasi input
        $request->validate([
            'order_product' => 'required',
            'order_product_sku' => 'required',
            'order_name' => 'required',
            'order_phone' => 'required',
            'order_price' => 'required',
            'order_is_file' => 'required',
            'order_qty' => 'required|integer',
            'order_note' => 'nullable',
            'order_delivery' => 'required',
            'order_payment' => 'required',
        ]);
    
        // Generate Order ID
        $order_id = Str::random(9);
        $find = Products::where('sku', $request->order_product_sku)->first();
        // dd($find->stock - 1);
        // dd(now());
        // Simpan Order
        Orders::create([
            'order_id' => $order_id,
            'order_name' => $request->order_name,
            'order_phone' => $request->order_phone,
            'order_message' => $request->order_note,
            'product_sku' => $find->sku,
            'product_name' => $find->name,
            'product_type' => $find->type ?? null,
            'product_category' => $find->category ?? null,
            'product_brand' => $find->brand ?? null,
            'order_is_file' => $request->order_is_file,
            'product_is_promo' => $find->is_promo ?? 0,
            'product_amount' => $request->order_qty,
            'product_price_unit' => $request->order_price ?? 0,
            'product_price_totals' => ($request->order_price ?? 0) * $request->order_qty,
            'product_price_discount' => $find->discount_price ?? null,
            'product_percentage_discount' => $find->percentage_discount ?? null,
            'product_payment_method' => $request->order_payment,
            'product_delivery' => $request->order_delivery,
        ]);
        
        if ($request->order_is_file == 1) {
            // Proses File Upload
            $filePaths = [];
            if ($request->order_is_file == 1) {
                for ($i = 0; $i < $request->order_qty; $i++) {
                    // Pastikan file ada
                    if ($request->hasFile('order_file' . ($i + 1))) {
                        $filePaths[$i + 1] = $request->file('order_file' . ($i + 1))->store('orders', 'public');
                    } else {
                        $filePaths[$i + 1] = null;
                    }
                }
            }
    
            // Simpan ke tabel file_order
            FilesOrder::create([
                'order_id' => $order_id,
                'file_amount' => $request->order_qty,
                'file_path_1' => $filePaths[1] ?? null,
                'file_path_2' => $filePaths[2] ?? null,
                'file_path_3' => $filePaths[3] ?? null,
                'file_path_4' => $filePaths[4] ?? null,
                'file_path_5' => $filePaths[5] ?? null,
            ]);
        }
        
        Products::where('sku', $request->order_product_sku)->update([
            'stock' => $find->stock - $request->order_qty
        ]);
    
        // Redirect dengan pesan sukses
        Session::put('user_ordered', $order_id);
        return redirect()->route('order.detail', $order_id)->with('success', 'Pesanan berhasil dibuat!');
    }
    
    public function indexProductEndez(Request $request) {
        $query = $request->get('q');
        $type = $request->get('type');
        $category = $request->get('category');
        $harga_awal = $request->get('harga_awal');
        $harga_akhir = $request->get('harga_akhir');    

        // $findType = ProductsType::where('type_id', $type)->first;

        // Ambil data berdasarkan pencarian atau data default
        $data = Products::where('brand', 'endez')
        ->where('status', 'active')
        ->where('stock', '>', '0')
        ->with('promo')
        ->when($query, function ($queryBuilder) use ($query) {
            $queryBuilder->where(function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%");
            });
        })
        ->when($type, function ($queryBuilder) use ($type) {
            $queryBuilder->where('type', 'LIKE', "%{$type}%");
        })
        ->when($category, function ($queryBuilder) use ($category) {
            $queryBuilder->where('category', 'LIKE', "%{$category}%");
        })
        ->when($harga_awal, function ($queryBuilder) use ($harga_awal) {
            $queryBuilder->where('price', '>=', $harga_awal);
        })
        ->when($harga_akhir, function ($queryBuilder) use ($harga_akhir) {
            $queryBuilder->where('price', '<=', $harga_akhir);
        })
        ->orderBy('created_at', 'desc')
        ->paginate(20);

        if ($request->ajax()) {
            $morePages = count($data) == 10;
            return response()->json([
                'items' => $data->map(function ($item) {
                    return [
                        'id' => $item->id,
                        'sku' => $item->sku,
                        'name' => $item->name,
                        'brand' => $item->brand,
                        'star' => $item->star,
                        'reviews' => $item->reviews,
                        'image_path' => $item->image_path,
                        'price' => $item->price,
                        'status' => $item->status,
                        'is_promo' => $item->is_promo,
                        'promo' => $item->promo ? [
                            'percentage' => $item->promo->percentage,
                            'initial' => $item->promo->initial_price,
                            'promo' => $item->promo->promo_price,
                            'description' => $item->promo->description,
                            'start_date' => $item->promo->start_date,
                            'end_date' => $item->promo->end_date,
                            'status' => $item->promo->status,
                        ] : null
                    ];
                }),
                'pagination' => [
                    'more' => $morePages
                ]
            ]);
        }
        
        return view("products.endez", compact('data'));
    }
    
    
    public function indexProductEndezDetail($id) {
        // dd($id);
        if (!$id) {
            return redirect()->back();
        }

        $data = Products::where('name', $id)->first();

        // dd($query);

        return view("products.endez-detail", compact('data'));
    }
    
    public function indexProductEndezCreate(Request $request) {
        // dd($request->request);
        $request->validate([
            'order_product' => 'required',
            'order_product_sku' => 'required',
            'order_name' => 'required',
            'order_phone' => 'required',
            'order_price' => 'required',
            'order_is_file' => 'required',
            'order_qty' => 'required|integer',
            'order_note' => 'nullable',
            'order_delivery' => 'required',
            'order_payment' => 'required',
        ]);
    
        // Generate Order ID
        $order_id = Str::random(9);
        $find = Products::where('sku', $request->order_product_sku)->first();
    
        // Simpan Order
        Orders::create([
            'order_id' => $order_id,
            'order_name' => $request->order_name,
            'order_phone' => $request->order_phone,
            'order_message' => $request->order_note,
            'product_sku' => $find->sku,
            'product_name' => $find->name,
            'product_type' => $find->type ?? null,
            'product_category' => $find->category ?? null,
            'product_brand' => $find->brand ?? null,
            'order_is_file' => $request->order_is_file,
            'product_is_promo' => $find->is_promo ?? 0,
            'product_amount' => $request->order_qty,
            'product_price_unit' => $request->order_price ?? 0,
            'product_price_totals' => ($request->order_price ?? 0) * $request->order_qty,
            'product_price_discount' => $find->discount_price ?? null,
            'product_percentage_discount' => $find->percentage_discount ?? null,
            'product_payment_method' => $request->order_payment,
            'product_delivery' => $request->order_delivery,
        ]);
        
        // jika file orders == 1 maka upload file
        if ($request->order_is_file == 1) {
            // Proses File Upload
            $filePaths = [];
            if ($request->order_is_file == 1) {
                for ($i = 0; $i < $request->order_qty; $i++) {
                    // Pastikan file ada
                    if ($request->hasFile('order_file' . ($i + 1))) {
                        $filePaths[$i + 1] = $request->file('order_file' . ($i + 1))->store('orders', 'public');
                    } else {
                        $filePaths[$i + 1] = null;
                    }
                }
            }
    
            // Simpan ke tabel file_order
            FilesOrder::create([
                'order_id' => $order_id,
                'file_amount' => $request->order_qty,
                'file_path_1' => $filePaths[1] ?? null,
                'file_path_2' => $filePaths[2] ?? null,
                'file_path_3' => $filePaths[3] ?? null,
                'file_path_4' => $filePaths[4] ?? null,
                'file_path_5' => $filePaths[5] ?? null,
            ]);
        }
    
        // Redirect dengan pesan sukses
        Session::put('user_ordered', $order_id);
        return redirect()->route('order.detail', $order_id)->with('success', 'Order berhasil dibuat!');
    }
    
    // public function indexPostCheckout(Request $request) {
    //     // dd($request);
    //     $is_valid = $request->validate([
    //         'order_product' => 'required',
    //         'order_price' => 'required',
    //         'order_qty' => 'required',
    //         'order_name' => 'required',
    //         'order_phone' => 'required',
    //         'order_note' => 'nullable',
    //         'order_is_file' => 'nullable',
    //         // 'order_files' => 'required',
    //         'order_delivery' => 'required',
    //         'order_payment' => 'required',
    //     ]);        
        
    //     if (!$is_valid) {
    //         return redirect()->back()->withErrors("error_checkout", "Gagal input tidak memenuhi validasi");
    //     }
        
    //     $shipping = 0;
    //     return view("products.checkout", [
    //         'order_product' => $request->order_product,
    //         'order_price' => $request->order_price,
    //         'order_qty' => $request->order_qty,
    //         'order_name' => $request->order_name,
    //         'order_phone' => $request->order_phone,
    //         'order_note' => $request->order_note,
    //         'order_is_file' => $request->order_is_file,
    //         'order_files' => $request->order_files,
    //         'order_delivery' => $request->order_delivery,
    //         'order_payment' => $request->order_payment,
    //         'shipping' => $shipping,
    //         ]);
    // }
    
   
    // public function indexCheckout() {
    //     return redirect()->route('home');
    // }
}
