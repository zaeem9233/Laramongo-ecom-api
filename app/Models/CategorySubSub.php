<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;
use App\Models\CategorySub;

class CategorySubSub extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_sub_id',
        'is_active',
    ];

    public function categorysub(){
        return $this->belongsTo(CategorySub::class);
    }


}
