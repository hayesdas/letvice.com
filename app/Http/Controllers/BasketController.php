<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function index(){
        session_start();
        if(isset($_SESSION['products'])){
            return view('basket', [
                'products' => $_SESSION['products'],
                'categories' => Category::all(),
            ]);
        } else {
            return view('basket',['categories' => Category::all()]);
        }
        
    }

    public function add(Request $request){
        session_start();
        if(!isset($_SESSION['products'][$request->name])){ // Если продукт впервые
            $_SESSION['products'][$request->name] = [
                'id' => $request->id,
                'name' => $request->name,
                'img' => $request->img,
                'size' => $request->size,
                'price' => $request->price,
                'sale' => $request->sale,
                'category' => $request->category,
                'count' => 1,
            ]; 
        } else {
            $count = $_SESSION['products'][$request->name]['count'];
            $_SESSION['products'][$request->name] = [
                'id' => $request->id,
                'name' => $request->name,
                'img' => $request->img,
                'size' => $request->size,
                'price' => $request->price,
                'sale' => $request->sale,
                'category' => $request->category,
                'count' => $count + 1,
            ]; 
        }
        
    }

    public function delete(Request $request){
        session_start();
        unset($_SESSION['products'][$request->name]);
        if(empty($_SESSION['products'])){
            session_unset();
        }
        return 'ok';
    }
}
