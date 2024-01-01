<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'img_link',
        'des',
        'meta_title',
        'meta_keyword',
        'meta_des',
    ];

    public function product(){
        return $this->hasMany(\App\Models\Product::class);
    }
}
