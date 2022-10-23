<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $all_product_count = Product::count();
        return view('admin', [
            'all_product_count' => $all_product_count,
            'products' => Product::all(),
        ]);
    }
}
