<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    protected $fillable = [
        'id',
        'order_id',
        'product_id',
        'order_name',
        'review',
        'star',
        'status'
    ];

    public function order() {
        return $this->belongsTo(Orders::class, 'order_id');
    }
}
