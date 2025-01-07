<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Popular extends Model
{
    use HasFactory;

    protected $table = "popular";

    protected $fillable = [
        'id',
        'sku',
        'name',
        'description',
        'status',
    ];
}
