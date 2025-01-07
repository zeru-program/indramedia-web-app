<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $dataPopular = Products::where('is_populer', 1)
        ->where('status', 'active')
        ->with('promo')
        ->paginate(10);
        $dataNewest = Products::orderBy('created_at', 'desc')
        ->where('status', 'active')
        ->with('promo')
        ->paginate(10);
        // dd($dataNewest);

        return view("landing-pages.home", compact('dataPopular', 'dataNewest'));
    }
}
