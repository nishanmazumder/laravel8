<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['product_name', 'product_price', 'category_id', 'brand_id','product_short_des','product_long_des','product_img','product_quantity', 'pub_status'];
}
