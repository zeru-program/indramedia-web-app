<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index() {
        if (Auth::check()) {
            return redirect()->route('home');
        } else {
            return view("auth.login");
        }
    }

    public function post(Request $request) {
        $request->validate([
            'username' => 'required|min:3',
            'password' => 'required|min:3',
        ]);

        $user = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        // dd($request->request);
        if (Auth::attempt($user)) {
            if (Auth::user()->role === "admin") {
                return redirect()->route('dashboard.index');
            } else {
                return redirect()->route('home')->with('succes_login', 'Berhasil login');
            }
        } else {
            return redirect()->back()->with('error_login', 'Gagal login, username atau password tidak cocok');
        }
    }
}
