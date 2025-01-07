<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Promo;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DashboardPromoController extends Controller
{
    public function indexPromo(Request $request) {
        if ($request->ajax()) {
            $query = Promo::query();
            
            return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                $data = [
                    'id' => $row->id, 
                    'sku' => $row->sku, 
                    'product_name' => $row->product_name, 
                    'name' => $row->name, 
                    'description' => $row->description,
                    'percentage' => $row->percentage,
                    'initial_price' => $row->initial_price,
                    'promo_price' => $row->promo_price,
                    'start_date' => $row->start_date,
                    'end_date' => $row->end_date,
                    'status' => $row->status, 
                    'created_at' => $row->created_at,
                    'updated_at' => $row->updated_at,
                    'urlEdit' => route('dashboard.promo.edit', ['id'=>$row->id])
                ];
                $jsonData = htmlspecialchars(json_encode($data), ENT_QUOTES, 'UTF-8'); // Safely encode to JSON
            
                return '
                <div class="d-flex gap-2" style="padding-right: 20px">
                    <!-- <button class="btn btn-action text-light bg-primary d-flex justify-content-center align-items-center" onclick="handleDetail(' . $jsonData . ')" data-bs-target="#modalDetail"><i class="bi-eye-fill"></i></button> -->
                    <button class="btn btn-action text-light bg-accent d-flex justify-content-center align-items-center" onclick="handleEdit(' . $jsonData . ')" data-bs-target="#modalEdit"><i class="bi-pencil-fill"></i></button>
                    <form action="' . route('dashboard.promo.delete', $row->id) . '" id="form-delete" method="post">
                        ' . csrf_field() . method_field('DELETE') . '
                        <button type="submit" class="btn btn-action text-light bg-danger d-flex justify-content-center align-items-center"><i class="bi-trash-fill"></i></button>
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

        return view('dashboard.promo');
    }

    public function postPromo(Request $request) {
        // dd($request);
        $is_valid = $request->validate([
            "sku" => "required",
            "name" => "required",
            "description" => "nullable",
            "percentage" => "required",
            "start_date" => "required",
            "end_date" => "required",
            "status" => "required",
        ]);

        if ($is_valid) {
            // dd($request->request);
            $find = Products::where('sku', $request->sku)
            ->where('status', 'active')
            ->first();

            if ($find) {
                $existingPromo = Promo::where('sku', $request->sku)
                ->first();
        
                if ($existingPromo) {
                    return redirect()->back()->withErrors([
                        'promo_exists' => 'Promo untuk produk ini sudah ada dan aktif.',
                    ]);
                }

                if ($request->status === "active") {
                   Products::where('sku', $find->sku)->update([
                        "is_promo" => 1
                    ]);
                }

                $calculatePromoFirst = $request->percentage / 100 * $find->price;
                $calculatePromoResult = $find->price - $calculatePromoFirst;
                $calculatePromoFirst = round($calculatePromoFirst, 2);
                $calculatePromoResult = round($calculatePromoResult, 2);


                Promo::create([
                    "sku" => $find->sku,
                    "product_name" => $find->name,
                    "name" => $request->name,
                    "description" => $request->description,
                    "initial_price" => $find->price,
                    "promo_price" => $calculatePromoResult,
                    "percentage" => $request->percentage,
                    "start_date" => $request->start_date,
                    "end_date" => $request->end_date,
                    "status" => $request->status,
                ]);

                return redirect()->back()->with("success_create_promo", "Berhasil membuat promo, promo berlaku sampai " . $request->end_date);
            } else {
                return redirect()->back()->withErrors([
                    'error_create_promo' => 'Product not found.',
                ]);
            }
        }
    }
    
    public function editPromo(Request $request, $id) {
        // dd($request);
        $is_valid = $request->validate([
            "name" => "required",
            "sku" => "required",
            "description" => "nullable",
            "percentage" => "required",
            "start_date" => "required",
            "end_date" => "required",
            "status" => "required",
        ]);

        if ($is_valid) {
            $find = Products::where('sku', $request->sku)
            ->where('status', 'active')
            ->first();

            if ($request->status === "active") {
               Products::where('sku', $find->sku)->update([
                    "is_promo" => 1
                ]);
            }

            $calculatePromoFirst = $request->percentage / 100 * $find->price;
            $calculatePromoResult = $find->price - $calculatePromoFirst;
            $calculatePromoFirst = round($calculatePromoFirst, 2);
            $calculatePromoResult = round($calculatePromoResult, 2);
            
            Promo::where('id', $id)->update([
                "name" => $request->name,
                "description" => $request->description,
                "percentage" => $request->percentage,
                "promo_price" => $calculatePromoResult,
                "start_date" => $request->start_date,
                "end_date" => $request->end_date,
                "status" => $request->status,
            ]);

            return redirect()->back()->with("success_edit_promo", "Berhasil mengedit data promo");
        } else {
            return redirect()->back()->withErrors("error_edit_promo", 'Error, validasi tidak memenuhi');
        }
    }

    public function deletePromo($id) {
        Promo::where('id', $id)->delete();

        return redirect()->back()->with("success_delete_promo", "Berhasil Mengahapus Promo.");
    }
}
