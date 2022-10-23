<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        $s = $request->s;
        $products = Product::select('name')
                    ->where('name', 'LIKE', "%{$s}%")
                    ->get();
        return response()->json($products);
    }
}
