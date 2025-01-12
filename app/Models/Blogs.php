<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;

    protected $table = 'blog';

    protected $fillable = [
        'id',
        'slug',
        'image',
        'title',
        'content',
        'category',
        'status',
        'created_by'
    ];
}
