<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Services\Search\SearchService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index($product_name, Request $request, SearchService $searchService){
        
        if(!empty($request->s)){ // Если пользователь ищет что-нибудь
            return redirect('/?s='.$request->s);
        }

        foreach(Product::where('name', $product_name)->get() as $a){
            $product = $a;
        };
        session_start();
        $_SESSION['view_category'] = $product['category'];
        return view('shoes', [
            'product' => $product,
            'categories' => Category::all(),
            'comments' => Comment::where('product', $product->id)->get(),
        ]);
    }
}
