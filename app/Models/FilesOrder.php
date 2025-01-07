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
        'file_path_1',
        'file_path_2',
        'file_path_3',
        'file_path_4',
        'file_path_5'
    ];
}
