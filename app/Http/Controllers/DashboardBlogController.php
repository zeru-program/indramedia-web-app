<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardBlogController extends Controller
{
    public function indexBlog(Request $request) {
        return view('dashboard.blog');
    }
}
