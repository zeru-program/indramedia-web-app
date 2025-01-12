<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilesOrder extends Model
{
    use HasFactory;

    protected $table = 'file_order';

    protected $fillable = [
        'order_id',
        'file_amount',
        'product_sku',
        'files'
    ];
}
