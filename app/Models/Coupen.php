<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

class Coupen extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_percent',
        'discount',
        'is_active',
    ];
}
