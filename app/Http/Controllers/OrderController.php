<?php

namespace App\Http\Controllers;

use App\Events\OrderCreated;
use App\Http\Requests\OrderCreateRequest;
use App\Models\Category;
use App\Models\Order;
use App\Services\Order\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class OrderController extends Controller
{
    public function index(Request $request){

        session_start();
        
        if(!$request->has('key')){
            return redirect('/');
        }
        if(!isset($_SESSION['order_key'])){
            return redirect('/');
        }
        if($request->key != $_SESSION['order_key']){
            return redirect('/');
        }

        if(isset($_SESSION['products'])){ // Если все хорошо
            return view('order', [
                'products' => $_SESSION['products'],
                'categories' => Category::all(),
            ]);
        } else {
            return redirect('/');
        }


    }

    public function order_create(OrderCreateRequest $request, OrderService $orderService){
        $orderService->create($request);
        return redirect('/');
    }

    public function create(Request $request){
        session_start();
        $_SESSION['order_key'] = $request->w;
    }    
}
