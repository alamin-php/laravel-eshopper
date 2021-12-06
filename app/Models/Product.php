<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'cat_id', 'brand_id', 'name', 'short_description', 'long_description', 'price', 'employee_phone', 'image', 'size', 'color', 'status',
    ];
}
