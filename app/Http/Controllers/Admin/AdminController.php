<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\Category\CategoryService;
use App\Services\Product\ProductService;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function product_create(){
        return view('admin.products.create', [
            'categories' => Category::all()
        ]);
    }

    public function product_create_post(ProductRequest $request, ProductService $productService){
        $return = $productService->create($request);
        if($return === true){ // Если все хорошо
            return redirect(route('admin.list'));
        }
        return view('admin.products.create', ['error' => $return]);
    }

    public function category_create(){
        return view('admin.categories.create');
    }

    public function category_create_post(Request $request, CategoryService $categoryService){
        $return = $categoryService->create($request);
        if($return === true){ // Если все хорошо
            return redirect(route('admin.list'));
        }
        return view('admin.categories.create', ['error' => $return]);
    }
}
