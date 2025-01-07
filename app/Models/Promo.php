<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;

    protected $table = 'promo';

    protected $fillable = [
        'id',
        'sku',
        'product_name',
        'name',
        'description',
        'initial_price',
        'promo_price',
        'percentage',
        'start_date',
        'end_date',
        'status'
    ];
}
