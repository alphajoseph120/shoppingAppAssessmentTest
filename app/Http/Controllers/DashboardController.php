<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductCategory;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index(){

        $counts = Order::selectRaw("COUNT(*) as total_order, SUM(status = 'pending') as pending_orders, SUM(status = 'dispatched') as dispatched_orders, SUM(status = 'delivered') as delivered_orders")->first();

        return view('dashboard',compact('counts'));
    }

    public function categoryListing(){

        $categories = ProductCategory::all();
        return response()->json($categories);
    }
    
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('login')->with('message','Logout Successfully!.');
    }
}
