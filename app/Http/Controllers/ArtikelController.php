<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index(Request $request) {
        $query = $request->get('q');
        $category = $request->get('category'); 

        // Ambil data berdasarkan pencarian atau data default
        $data = Blogs::where('status', 'active')
        ->when($query, function ($queryBuilder) use ($query) {
            $queryBuilder->where(function ($q) use ($query) {
                $q->where('title', 'LIKE', "%{$query}%")
                ->orWhere('slug', 'LIKE', "%{$query}%")
                ->orWhere('category', 'LIKE', "%{$query}%");
            });
        })
        ->when($category, function ($queryBuilder) use ($category) {
            $queryBuilder->where('category', 'LIKE', "%{$category}%");
        })
        ->orderBy('created_at', 'desc')
        ->paginate(20);

        // dd($data);
        if ($request->ajax()) {
            $morePages = count($data) == 10;
            return response()->json([
                'items' => $data->map(function ($item) {
                    return [
                        'id' => $item->id,
                        'title' => $item->title,
                        'slug' => $item->slug,
                        'image' => $item->image,
                        'content' => $item->content,
                        'category' => $item->category,
                        'status' => $item->status,
                        'created_by' => $item->created_by,
                        'created_at' => $item->created_at,
                    ];
                }),
                'pagination' => [
                    'more' => $morePages
                ]
            ]);
        }
        // dd($data);
        return view('landing-pages.artikel', compact('data'));
    }
    
    public function indexDetail($id) {
        if (!$id) {
            return redirect()->back();
        }

        $data = Blogs::where('slug', $id)->where('status', 'active')->first();

        // dd($data);
        if (!$data) {
            abort(404);
        }

        return view('landing-pages.artikel-detail', compact('data'));
    }
}
