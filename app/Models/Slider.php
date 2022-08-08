<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = ['slider_name', 'slider_name_color', 'slider_subtitle', 'slider_des', 'slider_img', 'pub_status'];
}