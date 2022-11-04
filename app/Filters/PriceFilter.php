<?php

namespace App\Filters;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class PriceFilter implements FilterInterface{

    public static function filter($request, $products_query)
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

    public static function view(){

        return 'price_filter';

            // 'Price From' => [
            //     'type' => 'input',
            //     'name' => 'price_from',
            //     'placeholder' => 'Price From',
            // ],
            // 'Price To' => [
            //     'type' => 'input',
            //     'name' => 'price_to',
            //     'placeholder' => 'Price To',
            // ],
        

    }

}