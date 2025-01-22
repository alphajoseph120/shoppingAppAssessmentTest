<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductDetails;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;

class CartController extends Controller
{
    public function index(Request $request)
    {

        $request->validate([
            'product_id' => 'required|exists:product_details,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product         = ProductDetails::find($request->product_id);
        $quantity        = $request->quantity;
        $totalPrice      = $product->product_price * $quantity;
        $productImageUrl = asset('images/product/' . $product->product_image);
       
        $cart = Cart::where('user_id', auth()->id())->first();
        if (!$cart) {
            $cart = Cart::create(['user_id' => auth()->id()]);
        }

        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity    = $quantity;
            $cartItem->total_price = $cartItem->quantity * $product->product_price;
            $cartItem->save();
        } else {
            CartItem::create([
                'cart_id'     => $cart->id,
                'product_id'  => $product->id,
                'quantity'    => $quantity,
                'total_price' => $totalPrice,
            ]);
        }

        return response()->json([
            'message' => 'Product added to cart successfully!',
            'product' => [
                'id' => $product->id,
                'name' => $product->product_name,
                'price' => $product->product_price,
                'image_url' => $productImageUrl,
            ],
            'cart' => $cart->load('cartItems'),
        ]);
    }

    public function placeOrder(Request $request){

        $request->validate([
            'user_id' => 'required',
        ]);

        $cart = Cart::where('user_id', auth()->id())->first();

        if (!$cart) {
            return response()->json([
                'code'    =>  400,
                'status'  => 'error',
                'message' => 'Cart is empty.'
            ], 400);
        }

        $totalAmount = $cart->cartItems->sum(function ($item) {
            return $item->total_price;
        });

        $order = Order::create([
            'user_id'      => auth()->id(),
            'status'       => 'pending', 
            'total_amount' => $totalAmount,
            'order_date'   => now(),
        ]);

        $products = $cart->cartItems->map(function ($item) {
            return [
                'product_id' => $item->product_id,
                'product_name' => $item->product->product_name, 
                'quantity' => $item->quantity,
                'total_price' => $item->total_price,
            ];
        });

        $cart->cartItems()->delete();

        return response()->json([
            'message' => 'Order placed successfully!',
            'order' => [
                'order_id'     => $order->id,
                'status'       => $order->status,
                'total_amount' => $order->total_amount,
                'order_date'   => $order->order_date->toDateTimeString(),
                'products'     => $products,
            ],
        ]);
    }
}
