<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    function categories() {
        return $this->belongsToMany(Category::class, 'category_product');
    }

    protected $fillable = [
        'name',
        'thumbnail',
        'description',
        'price',
        'pack',
        'from',
        'taste',
        'use',
        'ingredients',
        'category_id'
        ];
}
