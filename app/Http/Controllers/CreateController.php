<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\Product\ProductService;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function index(){
        return view('create', ['categories' => Category::all()]);
    }

    public function create(ProductRequest $request, ProductService $productService){
        $productService->create($request);
        return redirect('/');
    }
}
