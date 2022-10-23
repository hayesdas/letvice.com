<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'sale',
        'img',
        'category',
        'firm',
    ];

    static function products_in_category($category_name, $amount = null){
        return Product::where('category', $category_name)->take($amount)->get();
    }
}
