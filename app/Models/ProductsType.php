<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsType extends Model
{
    use HasFactory;

    protected $table = "products_type";

    protected $fillable = [
        'id',
        'type_id',
        'type_name',
        'description',
        'status',
    ];
}
