<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function index(){
        return view('auth');
    }

    public function login(LoginRequest $request, UserService $userService){
        if($userService->login($request) === false) return view('auth', ['error_login' => 'Error']);
        return redirect('/');
    }

    public function register(RegisterRequest $request, UserService $userService){
        if($userService->create($request) === false) return view('auth', ['error_register' => 'Error']);
        return redirect('/');
    }

}
