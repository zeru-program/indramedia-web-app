<?php

namespace App\Http\Controllers;

use App\Exports\ExportProducts;
use App\Http\Controllers\Controller;
use App\Imports\ImportProducts;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Promo;
use Carbon\Carbon;
use Illuminate\Container\Attributes\Log;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class DashboardProductsController extends Controller
{
    
    // products controler
    public function indexProducts(Request $request) {

        if ($request->ajax()) {
            $query = Products::query();
            
            return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                $data = [
                    'id' => $row->id, // Kolom ID
                    'sku' => $row->sku, // Kolom SKU
                    'image_path' => $row->image_path, // Kolom Path Gambar
                    'name' => $row->name, // Kolom Nama
                    'description' => $row->description, // Kolom Deskripsi
                    'type' => $row->type, // Kolom Tipe Produk
                    'category' => $row->category, // Kolom Kategori Produk
                    'brand' => $row->brand, // Kolom Merek
                    'price' => $row->price, // Kolom Harga
                    'stock' => $row->stock, // Kolom Stok
                    'is_populer' => $row->is_populer, // Apakah Produk Populer
                    'is_onefile' => $row->is_onefile, // Apakah Produk onefile
                    'is_multiplefile' => $row->is_multiplefile, // Apakah Produk multiplefile
                    'is_featured' => $row->is_featured, // Apakah Produk Featured
                    'is_promo' => $row->is_promo, // Apakah Produk Promo
                    'status' => $row->status, // Status Produk
                    'created_at' => $row->created_at, // Waktu Dibuat
                    'updated_at' => $row->updated_at,
                    'urlEdit' => route('dashboard.products.edit', ['id'=>$row->id])
                ];
                // dd($data);
                $jsonData = htmlspecialchars(json_encode($data), ENT_QUOTES, 'UTF-8'); // Safely encode to JSON
                // $jsonData = json_encode($data);
                // if ($jsonData === false) {
                //     Log::error("JSON encoding error: " . json_last_error_msg());
                //     return ''; // Jika gagal encode, return kosong
                // }

                // $jsonData = htmlspecialchars($jsonData, ENT_QUOTES, 'UTF-8'); // Safely encode to JSON

            
                return '
                <div class="d-flex gap-2" style="padding-right: 20px">
                    <button class="btn btn-action text-light bg-primary d-flex justify-content-center align-items-center" onclick="handleDetail(' . $jsonData . ')" data-bs-target="#modalDetail"><i class="bi-eye-fill"></i></button>
                    <button class="btn btn-action text-light bg-accent d-flex justify-content-center align-items-center" onclick="handleEdit(' . $jsonData . ')" data-bs-target="#modalEdit"><i class="bi-pencil-fill"></i></button>
                    <form action="' . route('dashboard.products.delete', $row->id) . '" id="form-delete" method="post">
                        ' . csrf_field() . method_field('DELETE') . '
                        <button type="button" onclick="popupDelete()" class="btn btn-action text-light bg-danger d-flex justify-content-center align-items-center"><i class="bi-trash-fill"></i></button>
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

        return view('dashboard.products');
    }

    public function postProducts(Request $request) {
        // dd($request);
        $is_valid = $request->validate([
            'id' => 'nullable', 
            'sku' => 'required', 
            'image_path' => 'nullable|max:2048|mimes:jpeg,png,jpg', 
            'name' => 'required',
            'produk_file' => 'required',
            'description' => 'nullable', 
            'type' => 'nullable',
            'category' => 'nullable', 
            'brand' => 'nullable', 
            'price' => 'required', 
            'stock' => 'required',
            'is_populer' => 'required', 
            'is_featured' => 'required', 
            'is_promo' => 'nullable',
            'status' => 'required',
        ]);

        $is_one_file = $request->produk_file === "hanya1" ? true : false;
        $is_multiple_file = $request->produk_file === "multiple" ? true : false;
        
        if ($is_valid) {
            $duplicateEntry = Products::where('sku', $request->sku)
            ->where('name', $request->name)
            ->first();

            if ($duplicateEntry) {
                return redirect()->back()->withErrors([
                    'error' => 'Produk sudah ada, gunakan SKU dan NAMA PRODUK lain.',
                ]);
            }

            if ($request->hasFile("image_path")) {
                $filePath = $request->file("image_path")->store('products', 'public');
                // $pathName =  $request->file('image')->hashName();
            }

            Products::create([
                    'id' => $request->id ?? null,
                    'sku' => $request->sku,
                    'image_path' => $request->hasFile('image_path') ? '/storage/' . $filePath : "/images/new/logo-1.png",
                    'name' => $request->name,
                    'description' => $request->description ?? null, // Opsional
                    'type' => strtolower($request->type) ?? null, // Opsional
                    'category' => strtolower($request->category) ?? null, // Opsional
                    'brand' => $request->brand ?? null, // Opsional
                    'price' => $request->price,
                    'stock' => $request->stock,
                    'is_onefile' => $is_one_file,
                    'is_multiplefile' => $is_multiple_file,
                    'is_populer' => $request->is_populer === 'true' ? true : false, 
                    'is_featured' => $request->is_featured === 'true' ? true : false,
                    'is_promo' => $request->is_promo === 'true' ? true : false,
                    'status' => strtolower($request->status) ?? 'active',
            ]);
            
            return redirect()->back()->with('success', 'Berhasil membuat product');
        } else {
           return redirect()->back()->withErrors("error", "Validasi tidak memenuhi");
        }
        // dd($request);
    }

    public function editProducts(Request $request, $id) {
        // dd(intval($request->is_promo_value) === 1 ? true : false);
        $is_valid = $request->validate([
            'id' => 'nullable', 
            'sku' => 'required', 
            'image_path_new' => 'nullable|max:2048|mimes:jpeg,png,jpg', 
            'name' => 'required',
            'produk_file' => 'required',
            'description' => 'nullable', 
            'type' => 'nullable',
            'category' => 'nullable', 
            'brand' => 'nullable', 
            'price' => 'required', 
            'stock' => 'required|min:0',
            'is_populer' => 'required', 
            'is_featured' => 'required', 
            'is_promo' => 'nullable', 
            'is_promo_value' => 'required', 
            'status' => 'required',
        ]);
        
        $is_one_file = $request->produk_file === "hanya1" ? true : false;
        $is_multiple_file = $request->produk_file === "multiple" ? true : false;

        if (intval($request->stock) < 0) {
            // dd(intval($request->stock));
            
            Products::where('id', $id)->update([
                "stock" => 0,
            ]);
            
            return redirect()->back()->withErrors([
                "error" => "Error stock tidak boleh kurang dari 0!"
            ]);
        }
        

        if ($is_valid) {
            $product = Products::findOrFail($id);
            $pathImg = null;
            
            if (intval($request->is_promo_value) === 1) {
                $promo = Promo::where('sku', $product->sku)->first();
                $calculatePromoFirst = $promo->percentage / 100 * $request->price;
                $calculatePromoResult = $request->price - $calculatePromoFirst;
                $calculatePromoFirst = round($calculatePromoFirst, 2);
                $calculatePromoResult = round($calculatePromoResult, 2);
                Promo::where('sku', $product->sku)->update([
                    'product_name' => $request->name,
                    'initial_price' => $request->price,
                    'promo_price' => $calculatePromoResult
                ]);
            }
    

            if ($request->hasFile("image_path_new")) {
                $pathImg = $request->file("image_path_new")->store('products', 'public');
                if ($product->image_path) {
                    Storage::disk('public')->delete($product->image_path);
                }
                Products::where('id', $id)->update([
                    'sku' => $request->sku,
                    'image_path' => '/storage/' . $pathImg,
                    'name' => $request->name,
                    'description' => $request->description ?? null, // Opsional
                    'type' => strtolower($request->type) ?? null, // Opsional
                    'category' => strtolower($request->category) ?? null, // Opsional
                    'brand' => $request->brand ?? null, // Opsional
                    'price' => $request->price,
                    'stock' => $request->stock,
                    'is_onefile' => $is_one_file,
                    'is_multiplefile' => $is_multiple_file,
                    'is_populer' => $request->is_populer === 'true' ? true : false, 
                    'is_featured' => $request->is_featured === 'true' ? true : false,
                    'is_promo' => intval($request->is_promo_value) === 1 ? true : false,
                    'status' => strtolower($request->status) ?? 'active',
                ]);
            } else {
                Products::where('id', $id)->update([
                    'sku' => $request->sku,
                    'image_path' => $product->image_path,
                    'name' => $request->name,
                    'description' => $request->description ?? null, // Opsional
                    'type' => $request->type ?? null, // Opsional
                    'category' => $request->category ?? null, // Opsional
                    'brand' => $request->brand ?? null, // Opsional
                    'price' => $request->price,
                    'stock' => $request->stock,
                    'is_onefile' => $is_one_file,
                    'is_multiplefile' => $is_multiple_file,
                    'is_populer' => $request->is_populer === 'true' ? true : false, 
                    'is_featured' => $request->is_featured === 'true' ? true : false,
                    'is_promo' => intval($request->is_promo_value) === 1 ? true : false,
                    'status' => strtolower($request->status) ?? 'active',
                ]);
            }
            return redirect()->back()->with('success', 'Berhasil mengedit data product');

        } else {
            return redirect()->back()->withErrors($is_valid);
        }
    }

    public function deleteProducts($id) {
        // dd($id);
        // $query = Products::where('id', $id)->delete();
        $product = Products::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }
    
        // Hapus file gambar dari storage jika ada
        if ($product->image_path && Storage::disk('public')->exists($product->image_path)) {
            Storage::disk('public')->delete($product->image_path);
        }

        $isDeleted = $product->delete();

        if ($isDeleted) {
            return redirect()->back()->with('success', 'Berhasil mengapus data product');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus data product, cek koneksi anda, atau laporkan ke bidang development');
        }
    }

    public function exportProducts() {
        return Excel::download(new ExportProducts, "rekap-products-indramedia-at" . Carbon::now()->timestamp . ".xlsx");
    }

    public function importProducts(Request $request) {
        // dd($request);
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        // Excel::import(new ImportProducts, $request->file('file'));
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataImportProducts', $namaFile);
        
        // Excel::import(new ImportProducts, public_path('/DataImportProducts/'.$namaFile));
        $import = new ImportProducts();

        // Lakukan proses impor
        Excel::import($import, public_path('/DataImportProducts/'.$namaFile));
    
        // Tangkap kesalahan
        $errors = $import->getErrors();

        
        if (!empty($errors)) {
            // Simpan kesalahan ke session
            $errorMessages = array_map(function ($error) {
                return "Error: " . $error['message'];
            }, $errors);
            // dd($errorMessages);
            // dd($errorMessages);
            return redirect()->back()->with([
                'success' => "Import berhasil dengan beberapa kesalahan.",
                // 'errors' => json_encode($errorMessages),
                'errors' => $errors,
            ]);
        }

        return redirect()->back()->with('success', "Berhasil Import Produk!");

    }
    // products controler
}
