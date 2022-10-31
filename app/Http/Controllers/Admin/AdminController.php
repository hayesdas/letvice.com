<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Services\Category\CategoryService;
use App\Services\Product\ProductService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

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
        $return = $productService->admin_create($request);
        if($return === true){ // Если все хорошо
            return redirect(route('admin.list'));
        }
        return view('admin.products.create', ['error' => $return]);
    }

    public function product_accept(Request $request, $id){
        $product = Product::find($id)->get()[0];
        $product->status = 'success';
        $product->save();
        return redirect()->back();
    }

    public function product_reject(Request $request, $id){
        $product = Product::find($id)->get()[0];
        $product->status = 'reject';
        $product->save();
        return redirect()->back();
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

    public function create(LoginRequest $request){
        Admin::create($request->validated());
        return redirect('/admin/list');
    }

    public function admin_users(){
        $admin_users = Admin::all();
        return view('admin.users.admin-users', ['admin_users' => $admin_users]);
    }

    public function admin_users_delete(Request $request){
        $id = $request->d;
        Admin::find($id)->delete();
        return redirect('/admin/admin-users');
    }

    public function login(){
        return view('admin.login');
    }

    public function login_post(Request $request)
    {
        $credentials = $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);
        if (Auth::guard('admin')->attempt($credentials)){
            return redirect()->route('admin.users.index');
        };
        return redirect()->route('admin.login');
    }

    public function products_query(){

        $productsAmount = Product::all()->count();
        $products = Product::where('status', 'false')->get();

        return view('admin.products.products_query', [
            'products' => $products,
            'productsAmount' => $productsAmount,
        ]);

    }
}
