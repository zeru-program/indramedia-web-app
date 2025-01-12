<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        if (Auth::check()) {
            return redirect()->route('home');
        } else {
            return view("auth.register");
        }
    }

    public function post(Request $request) {
        $validated = $request->validate([
            'username' => 'required|min:3|unique:users,username',
            'password' => 'required|min:3',
            'email' => 'required|min:3|email|unique:users,email',
            'phone' => 'required|min:3|unique:users,phone',
            'gender' => 'required',
        ]);

        try {
            if ($validated) {
            // dd($request->request);
            User::create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'email' => $request->email,
                'phone' => $request->phone,
                'role' => 'pembeli',
                'gender' => $request->gender === 'true' ? 1 : 0,
            ]);

            return redirect()->route('login')->with('success', 'Berhasil register, silakan Login');
            } else {
                // dd('gagal validate');
                return redirect()->back()->with('error', 'Error, semua input harus di isi');
            }
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) { // Error code untuk duplicate entry
                return redirect()->back()->with('error', 'Gagal register, username, email, atau phone sudah digunakan.');
            }
    
            return redirect()->route('register')->with('error', 'Terjadi kesalahan, silakan coba lagi.');
        }

    }
}
