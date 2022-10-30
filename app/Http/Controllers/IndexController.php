<?php

namespace App\Http\Controllers;

use App\Filters\FilterInterface;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use App\Services\Search\SearchService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request, SearchService $searchService, FilterInterface $filters){
        
        $query = Product::query()->where('status', 'success');

        $query = $filters->filter($request, $query);

        if(!empty($request->s)){ // Если пользователь ищет что-нибудь
            return $searchService->search($request);
        }
        
        if(isset($_SESSION['view_category'])){
            $recommended = Product::where('category', $_SESSION['view_category'])->get();
            return view('index',[
                'mas' => $query->get(),
                'categories' => Category::all(),
                'recommended' => $recommended,
            ]);
        }

        return view('index',[
            'mas' => $query->get(),
            'categories' => Category::all(),
        ]);
        
    }
}
