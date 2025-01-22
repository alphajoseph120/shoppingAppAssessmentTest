<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductDetails;
use App\Models\ProductCategory;
use App\Models\OrderItem;

class ProductDetailsController extends Controller
{
    public function index(Request $request, $id){

        $products = ProductDetails::where('category_id',$id)->get();

        if ($request->has('product_name')) {
            $query->where('product_name', 'like', '%' . $request->product_name . '%');
        }
        // $products = $query->paginate(10); 

        return view('product-list', compact('products', 'id'));
    }

    public function productListing(Request $request) {
        $query = ProductDetails::query();
    
        if ($request->has('product_name')) {
            $query->where('product_name', 'like', '%' . $request->product_name . '%');
        }
    
        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('category_id', $request->category_id);
        }
    
        $products = $query->paginate(10); 
        $categories = ProductCategory::all();
    
        return view('product-list', compact('products', 'categories'));
    }

    public function orderReport(){

        $orders = OrderItem::with('product.category')->paginate(10);

        return view('order-list', compact('orders'));
    }
    
}
