<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class DashboardBlogController extends Controller
{
    public function indexBlog(Request $request) {
        if ($request->ajax()) {
            $blogs = Blogs::query();

            return DataTables::of($blogs)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                $data = [
                    'slug' => $row->slug,
                    'title' => $row->title,
                    'image' => $row->image,
                    'category' => $row->category,
                    'content' => $row->content,
                    'created_at' => $row->created_at,
                    'status' => $row->status,
                    'created_by' => $row->created_by,
                    'urlEdit' => route('dashboard.blog.edit', ['id'=>$row->id])
                ];
                $jsonData = htmlspecialchars(json_encode($data), ENT_QUOTES, 'UTF-8'); // Safely encode to JSON
            
                return '
                <div class="d-flex gap-2" style="padding-right: 20px">
                    <button class="btn btn-action text-light bg-accent d-flex justify-content-center align-items-center" onclick="handleEdit(' . $jsonData . ')" data-bs-target="#modalEdit"><i class="bi-pencil-fill"></i></button>
                    <form action="' . route('dashboard.blog.delete', $row->id) . '" method="post">
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

        return view('dashboard.blog');
    }

    public function postBlog(Request $request) {
        $request->validate([
            'image_path' => 'nullable|mimes:jpeg,png,jpg',
            'title' => 'required',
            'category' => 'required',
            'content' => 'required',
            'status' => 'required',
        ]);

        $duplicateEntry = Blogs::where('slug', $request->title)
            ->where('title', $request->title)
            ->first();

            if ($duplicateEntry) {
                return redirect()->back()->withErrors([
                    'error' => 'Artikel sudah ada, gunakan Nama judul artikel lain.',
                ]);
            }

        if ($request->hasFile("image_path")) {
            $filePath = $request->file("image_path")->store('blogs', 'public');
            // $pathName =  $request->file('image')->hashName();
        }

        Blogs::create([
            'image' => $request->hasFile('image_path') ? '/storage/' . $filePath : "/images/new/logo-1.png",
            'title' => $request->title,
            'slug' => $request->title,
            'category' => $request->category,
            'content' => $request->content,
            'status' => $request->status,
            'created_by' => Auth::user()->username,
        ]);

        return redirect()->back()->with('success', 'Berhasil membuat artikel');
    }

    public function editBlog(Request $request, $id) {
        $request->validate([
            'image_path_new' => 'nullable|mimes:jpeg,png,jpg',
            'title' => 'required',
            'category' => 'required',
            'content' => 'required',
            'status' => 'required',
        ]);

        $blog = Blogs::findOrFail($id);

        if ($request->hasFile("image_path_new")) {
            $pathImg = $request->file("image_path_new")->store('blogs', 'public');
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
        }

        Blogs::where('id', $id)->update([
            'image' => $request->hasFile('image_path_new') ? '/storage/' . $pathImg : $blog->image,
            'title' => $request->title,
            'slug' => $request->title,
            'category' => $request->category,
            'content' => $request->content,
            'created_by' => $request->created_by ?? $blog->created_by,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Berhasil mengubah artikel');
    }

    public function deleteBlog($id) {
        // dd($id);
        // $query = Products::where('id', $id)->delete();
        $blogs = Blogs::find($id);

        if (!$blogs) {
            return redirect()->back()->with('error', 'blogs not found.');
        }
    
        // Hapus file gambar dari storage jika ada
        if ($blogs->image && Storage::disk('public')->exists($blogs->image)) {
            Storage::disk('public')->delete($blogs->image);
        }

        $isDeleted = $blogs->delete();

        if ($isDeleted) {
            return redirect()->back()->with('success', 'Berhasil mengapus data blogs');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus data blogs, cek koneksi anda, atau laporkan ke bidang development');
        }
    }
}
