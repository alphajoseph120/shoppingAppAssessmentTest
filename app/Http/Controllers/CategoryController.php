<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;

class CategoryController extends Controller
{
    public function index(Request $request){

        $query = ProductCategory::query();
    
        if ($request->has('category_name')) {
            $query->where('category_name', 'like', '%' . $request->category_name . '%');
        }
    
        $categories = $query->paginate(5); 
        return view('product-category',compact('categories'));
    }
}
