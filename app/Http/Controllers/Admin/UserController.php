<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Services\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index', ['users' => User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, UserService $userService)
    {
        $userService->create($request);
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('author', $id)->delete();
        User::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $usersAmount = User::all()->count();
        $users = User::where('login', 'LIKE', "%{$request->login}%")->get();
        if ($users->count() == 0) {
            return redirect()->route('admin.users.index')->with(['message' => "Нет такого пользователя { $request->login }"]);
        }
        foreach ($users as $user) {
            if(Order::all()->count() >= 1){
                foreach (Order::all() as $order) {
                    if($order['email'] == $user['email']){
                        $user['amoutn_of_orders'] = $user['amoutn_of_orders'] + $order->total_price;
                    } else {
                        $user['amoutn_of_orders'] = 0;
                    }
                }
            }
            $user['amoutn_of_orders'] = 0;
        }

        return view('admin.users.search', ['users' => $users, 'userAmount' => $usersAmount]);
    }
    
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
