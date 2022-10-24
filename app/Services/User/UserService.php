<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService{

    public function create($request){
        if(User::where('login', $request->login)->exists()){ // Если такой уже есть
            return false;
        }
        if(User::where('email', $request->email)->exists()){ // Если такой уже есть
            return false;
        }
        if($request->password != $request->confirm_password){
            return false;
        }
        $user = User::create([
            'login' => $request->login,
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'user',
        ]);
        Auth::login($user);
    }

    public function login($request){
        if(Auth::attempt($request->validated())){
        } else {
            return false;
        };
    }

}