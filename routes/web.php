<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/auth', [AuthController::class, 'index'])->name('auth');
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);

Route::get('/logout', function(){Auth::logout();return redirect('/');});

Route::get('/', [IndexController::class, 'index']);
Route::get('/create', [CreateController::class, 'index']);
Route::post('/create', [CreateController::class, 'create']);

Route::get('/article/{product_name}', [ArticleController::class, 'index']);

Route::get('/basket', [BasketController::class, 'index']);
Route::post('/basket', [BasketController::class, 'add']);
Route::post('/basket/delete', [BasketController::class, 'delete']);

Route::get('/order', [OrderController::class, 'index']);
Route::post('/order', [OrderController::class, 'order_create']);
Route::post('/order/8b1df807913bf7cfa8058ee1edd7d7e6', [OrderController::class, 'create']);

Route::middleware('auth')->get('/orders', [OrdersController::class, 'index']);

Route::get('/category/{category}', [CategoryController::class, 'index']);

Route::get('/admin', [AdminController::class, 'index']);

