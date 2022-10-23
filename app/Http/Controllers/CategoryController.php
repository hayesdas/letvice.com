<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($category){
        if(Category::where('name', $category)->exists()){
            return view('category', [
                'products' => Product::products_in_category($category),
                'category_name' => Category::where('name', $category)->get()[0]['name'],
                'categories' => Category::all(),
            ]);
        } else {
            return 'Not Found';
        }
        
    }
}
