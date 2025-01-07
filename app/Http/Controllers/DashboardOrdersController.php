<?php

namespace App\Http\Controllers;

use App\Exports\ExportOrders;
use App\Http\Controllers\Controller;
use App\Models\FilesOrder;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Products;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class DashboardOrdersController extends Controller
{
    
    // orders controler
    public function indexOrders(Request $request) {
        if ($request->ajax()) {
            $orders = Orders::query()->orderBy('created_at', 'desc');

            return DataTables::of($orders)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                $data = [
                    'order_id' => $row->order_id,
                    'order_name' => $row->order_name,
                    'order_phone' => $row->order_phone,
                    'order_message' => $row->order_message,
                    'product_sku' => $row->product_sku,
                    'product_name' => $row->product_name,
                    'product_type' => $row->product_type,
                    'product_category' => $row->product_category,
                    'product_brand' => $row->product_brand,
                    'order_is_file' => $row->order_is_file,
                    'product_is_promo' => $row->product_is_promo,
                    'product_amount' => $row->product_amount,
                    'product_price_unit' => $row->product_price_unit,
                    'product_price_discount' => $row->product_price_discount,
                    'product_percentage_discount' => $row->product_percentage_discount,
                    'product_price_totals' => $row->product_price_totals,
                    'product_payment_method' => $row->product_payment_method,
                    'product_delivery' => $row->product_delivery,
                    'status' => $row->status,
                    'urlEdit' => route('dashboard.orders.edit', ['id'=>$row->id])
                ];
                $jsonData = htmlspecialchars(json_encode($data), ENT_QUOTES, 'UTF-8'); // Safely encode to JSON
            
                return '
                <div class="d-flex gap-2" style="padding-right: 20px">
                    <button class="btn btn-action text-light bg-primary d-flex justify-content-center align-items-center" onclick="handeDetail(' . $jsonData . ')" data-bs-target="#modalDetail"><i class="bi-eye-fill"></i></button>
                    <button class="btn btn-action text-light bg-accent d-flex justify-content-center align-items-center" onclick="handleEdit(' . $jsonData . ')" data-bs-target="#modalEdit"><i class="bi-pencil-fill"></i></button>
                    <form action="' . route('dashboard.orders.delete', $row->id) . '" method="post">
                        ' . csrf_field() . method_field('DELETE') . '
                        <button class="btn btn-action text-light bg-danger d-flex justify-content-center align-items-center"><i class="bi-trash-fill"></i></button>
                    </form>
                </div>
                ';
            })            
            // ->filter(function ($query) use ($request) {
            //     if ($request->get('search')) {
            //         $query->where('order_id', $request->get('search'));
            //     }
            // })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view("dashboard.orders");
    }

    public function postOrders(Request $request) {
        $is_valid =  $request->validate([
            'order_id' => 'nullable',
            'order_name' => 'required',
            'order_phone' => 'required',
            'order_message' => 'nullable',
            'product_sku' => 'nullable',
            'product_name' => 'required',
            'product_type' => 'nullable',
            'product_category' => 'nullable',
            'product_brand' => 'nullable',
            'order_is_file' => 'nullable',
            'product_is_promo' => 'nullable',
            'product_amount' => 'required|integer|min:0',
            'product_price_unit' => 'required|numeric|min:0',
            'product_price_discount' => 'nullable|numeric|min:0',
            'product_percentage_discount' => 'nullable|numeric|min:0|max:100',
            'product_price_totals' => 'required|min:0',
            'product_payment_method' => 'required|string|max:255',
            'product_delivery' => 'required|string|max:255',
        ]);
        
        if ($is_valid) {
            Orders::create([
                'order_id' => $request->order_id ?? Str::random(8),
                'order_name' => $request->order_name,
                'order_phone' => $request->order_phone,
                'order_message' => $request->order_message,
                'product_sku' => $request->product_sku,
                'product_name' => $request->product_name,
                'product_type' => $request->product_type,
                'product_category' => $request->product_category,
                'product_brand' => $request->product_brand,
                'order_is_file' => $request->order_is_file === 'true' ? true : false,
                'product_is_promo' => $request->product_is_promo === 'true' ? true : false,
                'product_amount' => $request->product_amount,
                'product_price_unit' => $request->product_price_unit,
                'product_price_discount' => $request->product_price_discount,
                'product_percentage_discount' => $request->product_percentage_discount,
                'product_price_totals' => $request->product_price_totals,
                'product_payment_method' => $request->product_payment_method,
                'product_delivery' => $request->product_delivery,
            ]);
            
            return redirect()->back()->with('success_create_order', 'Berhasil membuat order');
        } else {
            dd($request->request);
        }
    }

    public function editOrders(Request $request, $id) {
        // dd($request);
        $is_valid =  $request->validate([
            'order_id' => 'nullable',
            'order_name' => 'required',
            'order_phone' => 'required',
            'order_message' => 'nullable',
            'product_sku' => 'nullable',
            'product_name' => 'required',
            'product_type' => 'nullable',
            'product_category' => 'nullable',
            'product_brand' => 'nullable',
            'order_is_file' => 'required',
            'product_is_promo' => 'nullable',
            'product_amount' => 'required|integer|min:0',
            'product_price_unit' => 'required|numeric|min:0',
            'product_price_discount' => 'nullable|numeric|min:0',
            'product_percentage_discount' => 'nullable|numeric|min:0|max:100',
            'product_price_totals' => 'required|min:0',
            'product_payment_method' => 'required|string|max:255',
            'product_delivery' => 'required|string|max:255',
            'status' => 'nullable'
        ]);

        if ($is_valid) {

            Orders::where('id', $id)->update([
                'order_id' => $request->order_id ?? Str::random(8),
                'order_name' => $request->order_name,
                'order_phone' => $request->order_phone,
                'order_message' => $request->order_message,
                'product_sku' => $request->product_sku,
                'product_name' => $request->product_name,
                'product_type' => $request->product_type,
                'product_category' => $request->product_category,
                'product_brand' => $request->product_brand,
                'order_is_file' => $request->order_is_file === 'true' ? true : false,
                'product_is_promo' => $request->product_is_promo === 'true' ? true : false,
                'product_amount' => $request->product_amount,
                'product_price_unit' => $request->product_price_unit,
                'product_price_discount' => $request->product_price_discount,
                'product_percentage_discount' => $request->product_percentage_discount,
                'product_price_totals' => $request->product_price_totals,
                'product_payment_method' => $request->product_payment_method,
                'product_delivery' => $request->product_delivery,
                'status' => $request->status ?? 'success'
            ]);

            $find = Orders::where('id', $id)->first();
            $findProduct = Products::where('sku', $request->product_sku)->first();
            if ($find->status === "success") {
                Products::where('sku', $request->product_sku)->update([
                    "reviews" => $findProduct->reviews + 1
                ]);
                if ($find->order_is_file == 1) {
                    $getFileOrder = FilesOrder::where('order_id', $find->order_id)->first();
                    if ($getFileOrder) {
                        for ($i = 0; $i < $find->product_amount; $i++) {
                            // dd($getFileOrder->file_path_1);  
                            Storage::disk('public')->delete($getFileOrder->{'file_path_' . ($i + 1)});
                        }
                    }
                }
            }
            
            return redirect()->back()->with('success_create_order', 'Berhasil mengedit data order');

        } else {
            dd($request->request);
        }
    }

    public function deleteOrders($id) {
        // dd($id);
        $query = Orders::where('id', $id)->delete();

        if ($query) {
            return redirect()->back()->with('success_delete_order', 'Berhasil mengapus data order');
        } else {
            return redirect()->back()->with('error_delete_order', 'Gagal menghapus data order, cek koneksi anda, atau laporkan ke bidang development');
        }
    }

    public function exportOrders() {
        return Excel::download(new ExportOrders, "rekap-orders-indramedia-at" . Carbon::now()->timestamp . ".xlsx");
    }
    // orders controler
}
