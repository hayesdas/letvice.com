<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\User;
use App\Services\Product\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function index(Request $request){

        if(Auth::user()->role != 'Seller'){
            return redirect()->back();
        }

        if(empty(Auth::user()->firm)){ // Если пользователь не создал фирму

            if(isset($request->creation)){ // Если идет создание фирмы

                return view('products.create_firm');

            }
            return redirect(route('products.create', ['creation' => 'firm']));
        }

        
        return view('products.create', ['categories' => Category::all()]);

    }

    public function create(ProductRequest $request, ProductService $productService){

        // if(Auth::user()->role != 'Seller'){
        //     return redirect()->back();
        // }

        if(isset($request->creation)){ // Если пользователь отправил запрос на создание фирмы


            return 'ok';
            // $user = User::where('login', Auth::user()->login)->get()[0];
            // $user->firm = $request->firm;
            // $user->save();
            // return $user;

        }

        // Создание продукта

        // $return = $productService->create($request);
        // if($return === true){ // Если все хорошо
        //     return redirect('/');
        // }
        // return view('products.create', ['error' => $return]);

        



    }
}
