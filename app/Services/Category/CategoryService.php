<?php

namespace App\Services\Category;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryService{

    public function create(Request $request){

        // Если такая уже есть
        if(Category::where('name', $request->name)->exists()){ 
            return 'This category already exists';
        }

        Category::create(['name' => $request->name]);
        return true;

    }

}