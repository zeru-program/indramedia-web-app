<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersItems extends Model
{
    use HasFactory;

    protected $table = 'orders_items';

    protected $fillable = [
        'order_id',
        'order_name',
        'order_phone',
        'order_message',
        'product_sku',
        'product_name',
        'product_type',
        'product_category',
        'product_brand',
        'order_is_onefile',
        'order_is_multiplefile',
        'product_is_promo',
        'product_amount',
        'product_price_unit',
        'product_price_discount',
        'product_percentage_discount',
        'product_price_totals',
        'status',
        'created_at',
        'updated_at',
    ];
}
