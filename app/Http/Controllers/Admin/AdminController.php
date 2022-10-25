<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Services\Category\CategoryService;
use App\Services\Product\ProductService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index(){

        $all_time_earnings = 0;
        foreach (Order::all() as $order) {
            $all_time_earnings = $all_time_earnings + $order->total_price;
        }

        $today_time_earnings = 0;
        foreach (Order::query()->where('created_at','>',Carbon::today())->get() as $order) {
            $today_time_earnings = $today_time_earnings + $order->total_price;
        }

        $new_users = User::query()->where('created_at','>',Carbon::today())->count();
        $new_categoires = Category::query()->where('created_at','>',Carbon::today())->count();
        $new_products = Product::query()->where('created_at','>',Carbon::today())->count();

        return view('admin.index', [
            'all_users' => User::all()->count(),
            'new_users' => $new_users,

            'all_time_earnings' => $all_time_earnings,
            'today_time_earnings' => $today_time_earnings,

            'all_categories' => Category::all()->count(),
            'new_categories' => $new_categoires,

            'all_products' => Product::all()->count(),
            'new_products' => $new_products,
        ]);
    }

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
