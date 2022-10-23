<?php

namespace App\Services\Product;

use App\Models\Category;
use App\Models\Product;

class ProductService{

    public function create($request){
        $path = $request->file('img')->store('uploads', 'public');
        $extention = $request->file('img')->getClientOriginalExtension();
        if($extention != 'jpg' && $extention != 'img'){
            return view('form', ['path' => 'Неправильное разрешение файла']);
        }
        Product::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'firm' => $request['firm'],
            'category' => $request['category'],
            'price' => $request['price'],
            'img' => $path,
        ]);
        // Если категория существует, ничего не делаем
        if(Category::where('name', $request['category'])->exists()){
        } else {
            Category::create(['name' => $request['category']]);
        }
    }

}