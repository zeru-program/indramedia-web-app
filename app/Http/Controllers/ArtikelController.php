<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index() {
        return view('landing-pages.artikel');
    }
    
    public function indexDetail() {
        return view('landing-pages.artikel-detail');
    }
}
