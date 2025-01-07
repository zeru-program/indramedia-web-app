<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Popular;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class DashboardPopularController extends Controller
{
    public function indexPopular(Request $request) {
        if ($request->ajax()) {
            $types = Popular::query();

            return DataTables::of($types)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                $data = [
                    'sku' => $row->sku,
                    'name' => $row->name,
                    'description' => $row->description,
                    'status' => $row->status,
                    'urlEdit' => route('dashboard.popular.edit', ['id'=>$row->id])
                ];
                $jsonData = htmlspecialchars(json_encode($data), ENT_QUOTES, 'UTF-8'); // Safely encode to JSON
            
                return '
                <div class="d-flex gap-2" style="padding-right: 20px">
                    <button class="btn btn-action text-light bg-accent d-flex justify-content-center align-items-center" onclick="handleEdit(' . $jsonData . ')" data-bs-target="#modalEdit"><i class="bi-pencil-fill"></i></button>
                    <form action="' . route('dashboard.popular.delete', $row->id) . '" method="post">
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

        return view('dashboard.popular');
    }

    public function postPopular(Request $request) {
        // dd($request);
        $request->validate([
            "sku" => "required",
            "name" => "required",
            "description" => "nullable",
            "status" => "required",
        ]);

        Popular::create([
            "sku" => $request->sku,
            "name" => $request->name,
            "description" => $request->description ?? "-",
            "status" => $request->status,
        ]);

        return redirect()->back()->with('success', 'Berhasil membuat produk menjadi popular');
    }

    public function editPopular(Request $request, $id) {
        $request->validate([
            "name" => "required",
            "description" => "nullable",
            "status" => "required",
        ]);

        
        Popular::where('id', $id)->update([
            "name" => $request->name,
            "description" => $request->description ?? "-",
            "status" => $request->status,
        ]);

        return redirect()->back()->with('success', 'Berhasil mengubah produk popular');
    }

    public function deletePopular($id) {
        // dd($id);
        $query = Popular::where('id', $id)->delete();

        if ($query) {
            return redirect()->back()->with('success', 'Berhasil menghapus produk popular');
        } else {
            return redirect()->back()->withErrors('error', 'Gagal menghapus produk popular');
        }
    }
}
