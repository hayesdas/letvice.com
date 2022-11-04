<?php

namespace App\Filters;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class CategoryFilter implements FilterInterface{

    public static function filter($request, $query)
    {
        if($request->filled('category_name')){
            $query->where('category', 'LIKE', "%{$request->category_name}%");
        }
        
        return $query;
    }

    public static function view(){

        return 'category_filter';
        
    }

}