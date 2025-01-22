<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\ProductDetails;

class ProductController extends Controller
{
    public function index(){
        
        $categories = ProductCategory::select('id','category_name')->get();

        if($categories){
            return response()->json([
                'code'    => 200,
                'status'  => 'success',
                'data'    => $categories,
            ]);
        }else{
            return response()->json([
                'code'    => 400,
                'status'  => 'error',
                'data'    => 'No data found',
            ]);
        }
    }

    public function productDetails(Request $request)
    {
        $query = ProductDetails::select('product_details.id', 'product_details.category_id', 'product_details.product_name', 'product_details.product_price', 'product_details.product_image', 'products_category.category_name')
            ->join('products_category', 'products_category.id', '=', 'product_details.category_id');
    
        if ($request->has('product_name') && !empty($request->product_name)) {
            $query->where('product_details.product_name', 'like', '%' . $request->product_name . '%');
        }
    
        if ($request->has('category_id') && !empty($request->category_id)) {
            $query->where('product_details.category_id', $request->category_id);
        }
    
        $products = $query->paginate(10);

        $products->getCollection()->transform(function($product) {
            $product->product_image_url = asset('images/product/' . $product->product_image);
            return $product;
        });
    
        return response()->json([
            'code'    => 200,
            'status'  => 'success',
            'data'    => $products,
        ]);
    }
    
}
