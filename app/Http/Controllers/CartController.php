<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', auth()->user()->id)->with('items')->get();

        return $carts;
    }

    public function store(Request $request)
    {
        $product_id = $request->get('product_id');

        if(!$product_id) {
            session()->flash('error', 'Select a product');
            return redirect('/');
        }

        $product = Product::find($product_id);

        $cart = Cart::where('user_id', auth()->id())->where('seller_id', $product->seller_id)->first();

        if(!$cart) {
            $cart = Cart::create([
                'user_id' => auth()->id(),
                'seller_id' => $product->seller_id
            ]);
        }

        $cart_item = CartItem::where('cart_id', $cart->id)->where('product_id', $product->id)->first();

        if($cart_item) {
            $cart_item->quantity += 1;
            $cart_item->save();
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }

        session()->flash('success', 'Added to cart');
        
        return redirect('/');
    }
}
