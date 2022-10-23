<?php

namespace App\Filters;

use App\Filters\FilterInterface;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class PriceFilter implements FilterInterface{

    public function filter($request, Builder $products_query)
    {
        if($request->filled('price_from')){
            if($request->price_from != '0'){
                $products_query =  $products_query->where('price', '>=', $request->price_from);
            }
        }
        
        if($request->filled('price_to')){
            if($request->price_to != '0'){
                if($request->price_to > Product::max('price')){
                    $products_query =  $products_query->where('price', '<=', Product::max('price'));
                } else {
                    $products_query =  $products_query->where('price', '<=', $request->price_to);
                }
            }
        }

        return $products_query;
    }

}