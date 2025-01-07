<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{   
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'id',
        'sku',
        'image_path',
        'name',
        'description',
        'type',
        'category',
        'brand',
        'price',
        'stock',
        'is_populer',
        'is_featured',
        'is_promo',
        'star',
        'reviews',
        'status'
    ];

    public function promo()
    {
        return $this->hasOne(Promo::class, 'sku', 'sku');
    }

    /**
     * Relasi ke tabel Reviews melalui tabel Orders.
     */
    // public function reviews() {
    //     return $this->hasManyThrough(
    //         Reviews::class,  // Model tujuan (Reviews)
    //         Orders::class,   // Model perantara (Orders)
    //         'order_id',    // Foreign key di Orders
    //         'order_id',      // Foreign key di Reviews
    //         'id',           // Primary key di Products
    //         'id'  // Primary key di Orders
    //     );
    // }

    // public function reviews()
    // {
    //     return $this->hasMany(Reviews::class, 'product_id', 'sku');
    // }


}
