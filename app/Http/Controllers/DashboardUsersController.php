<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class DashboardUsersController extends Controller
{
    public function indexUsers(Request $request) {
        if ($request->ajax()) {
            $types = User::query();

            return DataTables::of($types)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                $data = [
                    'username' => $row->username,
                    'picture' => $row->picture,
                    'phone' => $row->phone,
                    'email' => $row->email,
                    'gender' => $row->gender,
                    'status_akun' => $row->status_akun,
                    'role' => $row->role,
                    'urlEdit' => route('dashboard.users.edit', ['id'=>$row->id])
                ];
                $jsonData = htmlspecialchars(json_encode($data), ENT_QUOTES, 'UTF-8'); // Safely encode to JSON
            
                return '
                <div class="d-flex gap-2" style="padding-right: 20px">
                    <!-- <button class="btn btn-action text-light bg-accent d-flex justify-content-center align-items-center" onclick="handleEdit(' . $jsonData . ')" data-bs-target="#modalEdit"><i class="bi-pencil-fill"></i></button> -->
                    <form action="' . route('dashboard.users.delete', $row->id) . '" method="post">
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

        return view('dashboard.users');
    }

    public function postUsers(Request $request) {
        // dd($request);
        $request->validate([
            "username" => "required|max:255",
            "phone" => "required|min:10",
            "email" => "required|max:255",
            "gender" => "required|in:laki-laki,perempuan",
            "status_akun" => "required",
            "role" => "required",
            "password" => "required|min:6",
        ]);
        

        User::create([
            "username" => $request->username,
            "phone" => $request->phone,
            "email" => $request->email,
            "gender" => $request->gender,
            "status_akun" => $request->status_akun,
            "role" => $request->role,
            "password" => Hash::make($request->password),
        ]);
        

        return redirect()->back()->with('success', 'Berhasil membuat akun');
    }

    public function editUsers(Request $request, $id) {
        $request->validate([
            "name" => "required",
            "description" => "nullable",
            "status" => "required",
        ]);

        
        User::where('id', $id)->update([
            "type_name" => $request->name,
            "description" => $request->description ?? "-",
            "status" => $request->status,
        ]);

        return redirect()->back()->with('success', 'Berhasil mengubah type produk');
    }

    public function deleteUsers($id) {
        // dd($id);
        $query = User::where('id', $id)->delete();

        if ($query) {
            return redirect()->back()->with('success', 'Berhasil menghapus akun');
        } else {
            return redirect()->back()->withErrors('error', 'Gagal menghapus akun');
        }
    }
}
