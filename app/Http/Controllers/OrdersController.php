<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(){

        $ordersByUser = User::find(auth()->user()['id'])->ordersByUser;

        return view('orders', [
            'ordersByUser' => $ordersByUser,
            'categories' => Category::all(),
        ]);

    }
}
