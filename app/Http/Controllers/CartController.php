<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\FilesOrder;
use App\Models\Orders;
use App\Models\OrdersItems;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function cartPost(Request $request) {
        if (!Auth::check()) {
            // return redirect()->back()->with('error', 'Kamu harus login terlebih dahulu untuk menambahkan produk ke keranjang');
            return abort('404');
        }
        $request->validate([
            // "user_id" => Auth::user()->id,
            "product_sku" => "required",
            "qty" => "required"
        ]);

        $sameProduct = Cart::where('product_sku', $request->product_sku)->where('user_id', Auth::user()->id)->first();
        // dd($sameProduct->qty + $request->qty);

        if ($sameProduct) {
            Cart::where('product_sku', $request->product_sku)->where('user_id', Auth::user()->id)->update([
                "qty" => $sameProduct->qty + $request->qty
            ]);
            return redirect()->back()->with('success', 'Berhasil menambahkan produk ke keranjang');
        }
        
        Cart::create([
            "user_id" => Auth::user()->id,
            "product_sku" => $request->product_sku,
            "qty" => $request->qty
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan produk ke keranjang');
    }

    public function cartCheckoutIndex(Request $request) {
        if (!Auth::check()) {
            return abort('404');
        }
        $cart = Cart::query()->get();
        $totalAmount = 0;
        $total = 0;

        foreach ($cart as $c) {
            $product = Products::where('sku', $c->product_sku)->first(); 
            if ($product) { 
                $price = $product->price;
                $total = $price * $c->qty;
                $totalAmount += $total;
                $total = "Rp " . number_format($totalAmount, 0, ",", '.') ?? "Rp 0";
            }
        }

        if ($request->ajax()) {
            $cart = Cart::query()->get();
            return DataTables::of($cart)
                ->addIndexColumn()
                ->addColumn('product', function ($row) {
                    $findProduct = Products::where('sku', $row->product_sku)->first();
                    return $findProduct ? $findProduct->name : 'Produk tidak ditemukan';
                })
                ->addColumn('price', function ($row) {
                    $findProduct = Products::where('sku', $row->product_sku)->first();
                    return $findProduct ? $findProduct->price : 0;
                })
                ->addColumn('price_total', function ($row) {
                    $findProduct = Products::where('sku', $row->product_sku)->first();
                    return $findProduct ? $findProduct->price * $row->qty : 0;
                })
                ->addColumn('file_upload', function ($row) {
                    // Input file untuk setiap produk
                    $findProduct = Products::where('sku', $row->product_sku)->first();
                    if ($findProduct->is_multiplefile) {
                        $inputs = '<button class="btn btn-primary btn-upload-file my-2">Upload ' . $row->qty . ' file</button>';
                        return $inputs;
                    } else if ($findProduct->is_onefile) {
                        $inputs = '<button class="btn btn-primary btn-upload-file my-2">Upload ' . $row->qty . ' file</button>';
                        return $inputs;
                    } else {
                        return "Tidak Perlu";
                    }
                })
                ->addColumn('action', function ($row) {
                    return '
                        <div class="d-flex gap-2" style="padding-right: 20px">
                            <form action="' . route('cart.delete', ['id' => $row->id]) . '" method="post">
                                ' . csrf_field() . method_field('DELETE') . '
                                <button style="font-size: 13px;margin-block: 5px;padding: 10px 20px !important" class="btn bg-danger text-light d-flex justify-content-center align-items-center"><i class="bi-trash-fill"></i></button>
                            </form>
                        </div>
                    ';
                })
                ->rawColumns(['file_upload', 'action'])
                ->make(true);
        }
        

        return view('landing-pages.cart-checkout', compact('total'));
    }

    public function cartCheckoutPost(Request $request) {
        DB::beginTransaction(); // Mulai transaksi database

        try {
            $userId = Auth::id();
            $cartItems = Cart::where('user_id', $userId)->get();
    
            if ($cartItems->isEmpty()) {
                return back()->with('error', 'Keranjang belanja kosong!');
            }
    
            // Buat `order_id` baru di tabel `orders`
            $order = Orders::create([
                'order_id' => Str::random(9),
                'user_id' => $userId,
                'total_amount' => $cartItems->sum(function ($item) {
                    return $item->qty * $item->product->price; // Hitung total harga
                }),
                'status' => 'pending', // Atur status awal
            ]);
    
            // Iterasi setiap item di keranjang untuk dimasukkan ke `order_items`
            foreach ($cartItems as $cartItem) {
                OrdersItems::create([
                    'order_id' => $order->order_id,
                    'order_name' => $request->order_name,
                    'order_phone' => $request->order_phone,
                    'order_message' => $request->order_note,
                    'product_sku' => $find->sku,
                    'product_name' => $find->name,
                    'product_type' => $find->type ?? null,
                    'product_category' => $find->category ?? null,
                    'product_brand' => $find->brand ?? null,
                    'order_is_onefile' => $request->order_is_onefile,
                    'order_is_multiplefile' => $request->order_is_multiplefile,
                    'product_is_promo' => $find->is_promo ?? 0,
                    'product_amount' => $request->order_qty,
                    'product_price_unit' => $request->order_price ?? 0,
                    'product_price_totals' => ($request->order_price ?? 0) * $request->order_qty * 1.2,
                    'product_price_discount' => $find->discount_price ?? null,
                    'product_percentage_discount' => $find->percentage_discount ?? null,
                    'product_payment_method' => $request->order_payment,
                    'product_delivery' => $request->order_delivery,
                ]);
            }
    
            // Hapus semua item keranjang yang telah di-checkout
            Cart::where('user_id', $userId)->delete();
    
            DB::commit(); // Simpan semua perubahan
            return redirect()->route('orders.index')->with('success', 'Checkout berhasil!');
        } catch (\Exception $e) {
            DB::rollBack(); // Batalkan semua perubahan jika terjadi error
            return back()->with('error', 'Terjadi kesalahan saat checkout: ' . $e->getMessage());
        }

    }

    public function cartCheckoutDelete($id) {
        if (!$id) {
            return abort('404');
        }

        $res = Cart::where('id', $id)->delete();

        if ($res) {
            return redirect()->back()->with('success', 'Berhasil menghapus item dari keranjang');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus item dari keranjang');
        }
    }
}
