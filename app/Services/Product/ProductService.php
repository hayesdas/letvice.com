<?php

namespace App\Services\Product;

use App\Models\Category;
use App\Models\Product;

class ProductService{

    public function create($request){
        $path = $request->file('img')->store('uploads', 'public');
        $extention = $request->file('img')->getClientOriginalExtension();
        if($extention != 'jpg' && $extention != 'img'){ // Если неправильное разрешение
            return 'Dont file state';
        }
        if(!empty($request->sale)){ // Если поставлена скидка
            Product::create([
                'name' => $request['name'],
                'description' => $request['description'],
                'firm' => $request['firm'],
                'category' => $request['category'],
                'price' => $request['price'],
                'img' => $path,
                'sale' => $request->sale,
            ]);
            return true;
        }
        Product::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'firm' => $request['firm'],
            'category' => $request['category'],
            'price' => $request['price'],
            'img' => $path,
        ]);
        return true;
    }

}