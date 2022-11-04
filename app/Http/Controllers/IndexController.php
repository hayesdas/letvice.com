<?php

namespace App\Http\Controllers;

use App\Filters\Filter;
use App\Filters\FilterInterface;
use App\Filters\PriceFilter;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use App\Services\Search\SearchService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request, SearchService $searchService, Filter $filters){
        
        
        // return $filters->view();
        $query = Product::query()->where('status', 'success');

        $query = $filters->filter($request, $query);

        // return $query->get();
        // return $filters->view();
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
            'filters' => $filters->view(),
        ]);
        
    }
}
