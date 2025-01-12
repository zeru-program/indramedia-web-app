<?php

namespace App\Http\Controllers;

use App\Models\Popular;
use App\Models\Products;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request) {

        $product_name = $request->get('q');
        $brand = $request->get('b');
        $product_filter = $request->get('product_filter');

        $query = Products::query()->where('status', 'active')->where('stock', '>', '0');
        
        if ($product_name) {
            $query->where('name', 'like', '%' . $product_name . '%');
        }

        if ($brand) {
            $query->where('brand', $brand);
        }

        $findPopular = Popular::where('status', 'active')->pluck('sku');
        // $products = $query->whereIn('sku', $findPopular)->with(['promo'])->orderBy('created_at', 'desc')->paginate(10);
        $products = $query->with(['promo'])
        ->when($product_name, function ($queryBuilder) use ($product_name) {
            $queryBuilder->where(function ($q) use ($product_name) {
                $q->where('name', 'LIKE', "%{$product_name}%");
            });
        })
        ->when($brand, function ($queryBuilder) use ($brand) {
            $queryBuilder->where('brand', $brand);
        })
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        if ($request->ajax()) {
            $morePages = count($products) == 10;
            return response()->json([
                'items' => $products->map(function ($item) {
                    return [
                        'id' => $item->id,
                        'sku' => $item->sku,
                        'name' => $item->name,
                        'brand' => $item->brand,
                        'star' => $item->star,
                        'reviews' => $item->reviews,
                        'image_path' => $item->image_path,
                        'price' => $item->price,
                        'status' => $item->status,
                        'is_promo' => $item->is_promo,
                        'promo' => $item->promo ? [
                            'percentage' => $item->promo->percentage,
                            'initial' => $item->promo->initial_price,
                            'promo' => $item->promo->promo_price,
                            'description' => $item->promo->description,
                            'start_date' => $item->promo->start_date,
                            'end_date' => $item->promo->end_date,
                            'status' => $item->promo->status,
                        ] : null
                    ];
                }),
                'pagination' => [
                    'more' => $morePages
                ]
            ]);
        }

        return view("landing-pages.home", compact('products'));
    }
}
