<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'thumb_link',
        'img_links',
        'vid_links',
        'price',
        'des',
        'category_id',
        'brand_id',
        'user_id',
    ];

    public function category(){
        return $this->belongsTo(\App\Models\Category::class);
    }

    public function brand(){
        return $this->belongsTo(\App\Models\Brand::class);
    }

    public function user(){
        return $this->belongsTo(\App\Models\User::class);
    }

    public function cart(){
        return $this->hasMany(\App\Models\Cart::class);
    }
}
