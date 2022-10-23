<?php

namespace App\Services\Search;

use App\Models\Category;
use App\Models\Product;

class SearchService{

    public function search($request){
        $s = $request->s;
        if(Product::where('name', 'LIKE', "%{$s}%")->exists()){
            $category_name = 'search_result';
            $mas['all'] = Product::where('name', 'LIKE', "%{$s}%")->get();
            // return $mas;
            return view('index',[
                'mas' => $mas['all'],
                'categories' => Category::all(),
            ]);
        }
        return 'Product not found';
    }

}