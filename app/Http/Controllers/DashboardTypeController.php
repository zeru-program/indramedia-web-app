<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProductsType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class DashboardTypeController extends Controller
{
    public function indexProductsType(Request $request) {
        if ($request->ajax()) {
            $types = ProductsType::query();

            return DataTables::of($types)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                $data = [
                    'type_id' => $row->type_id,
                    'type_name' => $row->type_name,
                    'description' => $row->description,
                    'status' => $row->status,
                    'urlEdit' => route('dashboard.products.type.edit', ['id'=>$row->id])
                ];
                $jsonData = htmlspecialchars(json_encode($data), ENT_QUOTES, 'UTF-8'); // Safely encode to JSON
            
                return '
                <div class="d-flex gap-2" style="padding-right: 20px">
                    <button class="btn btn-action text-light bg-accent d-flex justify-content-center align-items-center" onclick="handleEdit(' . $jsonData . ')" data-bs-target="#modalEdit"><i class="bi-pencil-fill"></i></button>
                    <form action="' . route('dashboard.products.type.delete', $row->id) . '" method="post">
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

        return view('dashboard.products_type');
    }

    public function postProductsType(Request $request) {
        $request->validate([
            "name" => "required",
            "description" => "nullable",
            "status" => "required",
        ]);

        ProductsType::create([
            "type_id" => Str::random(10),
            "type_name" => strtolower($request->name),
            "description" => $request->description ?? "-",
            "status" => $request->status,
        ]);

        return redirect()->back()->with('success', 'Berhasil membuat type produk, silakan gunakan di pembuatan produk');
    }

    public function editProductsType(Request $request, $id) {
        $request->validate([
            "name" => "required",
            "description" => "nullable",
            "status" => "required",
        ]);

        
        ProductsType::where('id', $id)->update([
            "type_name" => strtolower($request->name),
            "description" => $request->description ?? "-",
            "status" => $request->status,
        ]);

        return redirect()->back()->with('success', 'Berhasil mengubah type produk');
    }

    public function deleteProductsType($id) {
        // dd($id);
        $query = ProductsType::where('id', $id)->delete();

        if ($query) {
            return redirect()->back()->with('success', 'Berhasil menghapus type produk');
        } else {
            return redirect()->back()->withErrors('error', 'Gagal menghapus type produk');
        }
    }
}
