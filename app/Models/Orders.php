<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';

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
        'order_is_file',
        'product_is_promo',
        'product_amount',
        'product_price_unit',
        'product_price_discount',
        'product_percentage_discount',
        'product_price_totals',
        'product_payment_method',
        'product_delivery',
        'status',
        'created_at',
        'updated_at',
    ];

    public function product() {
        return $this->belongsTo(Products::class, 'product_sku', 'sku');
    }

    public function reviews() {
        return $this->hasMany(Reviews::class, 'order_id');
    }
}
