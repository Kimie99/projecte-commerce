<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table="product";

    protected $fillable = [
        'id',
        'product_name',
        'product_price',
        'product_category',
        'product_image',
        'description',
        'product_qty',
        'path_image',
        'image'
    ];

    protected $casts = [
        'id' => 'integer',
        'product_name' => 'string',
        'product_price' => 'float',
        'product_category'=>'string',
        'product_image'=>'string',
        'description'=>'string',
        'product_qty'=>'integer'

    ];
}
