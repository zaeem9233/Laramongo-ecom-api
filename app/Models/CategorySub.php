<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;
use App\Models\CategorySubSub;

class CategorySub extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'is_active',
    ];

    public function category(){
        return $this->belongsTo(\App\Models\Category::class);
    }

    public function categorysubsub(){
        return $this->hasMany(CategorySubSub::class);
    }
}
