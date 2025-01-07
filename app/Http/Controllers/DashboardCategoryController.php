<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProductsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class DashboardCategoryController extends Controller
{
    public function indexProductsCategory(Request $request) {
        if ($request->ajax()) {
            $types = ProductsCategory::query();

            return DataTables::of($types)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                $data = [
                    'category_id' => $row->category_id,
                    'category_name' => $row->category_name,
                    'description' => $row->description,
                    'status' => $row->status,
                    'urlEdit' => route('dashboard.products.category.edit', ['id'=>$row->id])
                ];
                $jsonData = htmlspecialchars(json_encode($data), ENT_QUOTES, 'UTF-8'); // Safely encode to JSON
            
                return '
                <div class="d-flex gap-2" style="padding-right: 20px">
                    <button class="btn btn-action text-light bg-accent d-flex justify-content-center align-items-center" onclick="handleEdit(' . $jsonData . ')" data-bs-target="#modalEdit"><i class="bi-pencil-fill"></i></button>
                    <form action="' . route('dashboard.products.category.delete', $row->id) . '" method="post">
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

        return view('dashboard.products_category');
    }

    public function postProductsCategory(Request $request) {
        $request->validate([
            "name" => "required",
            "description" => "nullable",
            "status" => "required",
        ]);

        ProductsCategory::create([
            "category_id" => Str::random(10),
            "category_name" => strtolower($request->name),
            "description" => $request->description ?? "-",
            "status" => $request->status,
        ]);

        return redirect()->back()->with('success', 'Berhasil membuat category produk, silakan gunakan di pembuatan produk');
    }

    public function editProductsCategory(Request $request, $id) {
        $request->validate([
            "name" => "required",
            "description" => "nullable",
            "status" => "required",
        ]);

        
        ProductsCategory::where('id', $id)->update([
            "category_name" => strtolower($request->name),
            "description" => $request->description ?? "-",
            "status" => $request->status,
        ]);

        return redirect()->back()->with('success', 'Berhasil mengubah category produk');
    }

    public function deleteProductsCategory($id) {
        // dd($id);
        $query = ProductsCategory::where('id', $id)->delete();

        if ($query) {
            return redirect()->back()->with('success', 'Berhasil menghapus category produk');
        } else {
            return redirect()->back()->withErrors('error', 'Gagal menghapus category produk');
        }
    }
}
