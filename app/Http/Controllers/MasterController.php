<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterController extends Controller
{
    public function getProducts(Request $request) {
        $search = $request->input('q');
        $sku = $request->input('sku');
        $product_name = $request->input('product_name');
        $page = $request->input('page', 1);
        $pageSize = 10;

        $query = DB::table('products')
            ->select();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $results = $query
            ->get();

        $morePages = count($results) == $pageSize;

        return response()->json([
            'items' => $results->map(function ($item) {
                return [
                    'id' => $item->id,
                    'sku' => $item->sku,
                    'name' => $item->name,
                    'image_path' => $item->image_path,
                    'price' => $item->price,
                    'status' => $item->status,
                ];
            }),
            'pagination' => [
                'more' => $morePages
            ]
        ]);

    }

    public function getType(Request $request) {
        $search = $request->input('q');
        $pageSize = 10;

        $query = DB::table('products_type')
            ->where('status', 'active')
            ->select();

        if ($search) {
            $query->where('type_id', 'like', '%' . $search . '%');
        }

        $results = $query
            ->get();

        $morePages = count($results) == $pageSize;

        return response()->json([
            'items' => $results->map(function ($item) {
                return [
                    'type_id' => $item->type_id,
                    'type_name' => $item->type_name,
                    'description' => $item->description,
                    'status' => $item->status,
                ];
            }),
            'pagination' => [
                'more' => $morePages
            ]
        ]);

    }

    public function getCategory(Request $request) {
        $search = $request->input('q');
        $pageSize = 10;

        $query = DB::table('products_category')
            ->where('status', 'active')
            ->select();

        if ($search) {
            $query->where('category_id', 'like', '%' . $search . '%');
        }

        $results = $query
            ->get();

        $morePages = count($results) == $pageSize;

        return response()->json([
            'items' => $results->map(function ($item) {
                return [
                    'category_id' => $item->category_id,
                    'category_name' => $item->category_name,
                    'description' => $item->description,
                    'status' => $item->status,
                ];
            }),
            'pagination' => [
                'more' => $morePages
            ]
        ]);

    }

    public function getPromo(Request $request) {
        $search = $request->input('q');
        $pageSize = 10;

        $query = DB::table('promo')
            ->select();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $results = $query
            ->get();

        $morePages = count($results) == $pageSize;

        return response()->json([
            'items' => $results->map(function ($item) {
                return [
                    'id' => $item->id,
                    'sku' => $item->sku,
                    'product_name' => $item->product_name,
                    'name' => $item->name,
                    'description' => $item->description,
                    'initial_price' => $item->initial_price,
                    'promo_price' => $item->promo_price,
                    'percentage' => $item->percentage,
                    'start_date' => $item->start_date,
                    'end_date' => $item->end_date,
                    'status' => $item->status,
                ];
            }),
            'pagination' => [
                'more' => $morePages
            ]
        ]);

    }

    public function getPopular(Request $request) {
        $search = $request->input('q');
        $pageSize = 10;

        $query = DB::table('popular')
            ->select();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $results = $query
            ->get();

        $morePages = count($results) == $pageSize;

        return response()->json([
            'items' => $results->map(function ($item) {
                return [
                    'sku' => $item->sku,
                    'name' => $item->category_name,
                    'description' => $item->description,
                    'status' => $item->status,
                ];
            }),
            'pagination' => [
                'more' => $morePages
            ]
        ]);

    }
}
