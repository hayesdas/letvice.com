<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService{

    public function create($request){
        if(!empty($request->role)){
            $user = User::create([
                'login' => $request->login,
                'email' => $request->email,
                'password' => $request->password,
                'role' => $request->role,
            ]); 
        } else {
           $user = User::create([
                'login' => $request->login,
                'email' => $request->email,
                'password' => $request->password,
                'role' => 'User',
            ]); 
            Auth::login($user);
        }
    }

    public function login($request){
        if(Auth::attempt($request->validated())){
        } else {
            return false;
        };
    }

}