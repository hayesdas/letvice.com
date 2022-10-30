<?php

namespace App\Services\Product;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductService{

    public function create($request){
        $path = $request->file('img')->store('uploads', 'public');
        $extention = $request->file('img')->getClientOriginalExtension();
        if($extention != 'jpg' && $extention != 'img'){ // Если неправильное разрешение
            return 'Dont file state';
        }
        if(!empty($request->sale)){ // Если поставлена скидка
            $product = Product::create([
                'name' => $request['name'],
                'description' => $request['description'],
                'firm' => Auth::user()->firm,
                'category' => $request['category'],
                'price' => $request['price'],
                'img' => $path,
                'sale' => $request->sale,
            ]);
            $product->author = Auth::user()->id;
            $product->save();
            return true;
        }
        $product = Product::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'firm' => Auth::user()->firm,
            'category' => $request['category'],
            'price' => $request['price'],
            'img' => $path,
        ]);
        $product->author = Auth::user()->id;
        $product->save();
        return true;
    }

    public function admin_create($request){
        $path = $request->file('img')->store('uploads', 'public');
        $extention = $request->file('img')->getClientOriginalExtension();
        if($extention != 'jpg' && $extention != 'img'){ // Если неправильное разрешение
            return 'Dont file state';
        }
        if(!empty($request->sale)){ // Если поставлена скидка
            $product = Product::create([
                'name' => $request['name'],
                'description' => $request['description'],
                'firm' => $request['firm'],
                'category' => $request['category'],
                'price' => $request['price'],
                'img' => $path,
                'sale' => $request->sale,
            ]);
            $product->status = 'success';
            $product->save();
            return true;
        }
        $product = Product::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'firm' => $request['firm'],
            'category' => $request['category'],
            'price' => $request['price'],
            'img' => $path,
        ]);
        $product->status = 'success';
        $product->save();
        return true;
    }

}