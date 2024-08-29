<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', auth()->user()->id)->with('items.product', 'seller')->get();

        return view('carts', compact('carts'));
    }

    public function store(Request $request)
    {
        $product_id = $request->get('product_id');

        if (!$product_id) {
            session()->flash('error', 'Select a product');
            return redirect('/');
        }

        $product = Product::find($product_id);

        $cart = Cart::where('user_id', auth()->id())->where('seller_id', $product->seller_id)->first();

        if (!$cart) {
            $cart = Cart::create([
                'user_id' => auth()->id(),
                'seller_id' => $product->seller_id
            ]);
        }

        $cart_item = CartItem::where('cart_id', $cart->id)->where('product_id', $product->id)->first();

        if ($cart_item) {
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

    public function checkout(Cart $cart, Request $request)
    {
        $request->validate([
            'address' => 'required|string',
        ]);

        $sale['user_id'] = $cart->user_id;
        $sale['seller_id'] = $cart->seller_id;
        $sale['paid_amount'] = 0;
        $sale['subtotal'] = 0;
        $sale['delivery_address'] = $request->address;

        $sale_items = [];

        foreach ($cart->items as $item) {
            
            $total = $item->quantity * $item->product->sale_price;
            
            $sale['subtotal'] += $total;

            $saleItem = [
                'product_id' => $item->product_id,
                'unit_price' => $item->product->sale_price,
                'quantity' => $item->quantity,
                'total_price' => $total,
            ];

            $sale_items[] = $saleItem;
        }

        $sale['due_amount'] = $sale['subtotal'];
        $sale['items'] = $sale_items;

        $newSale = Sale::create($sale);
        foreach($sale_items as $sale_item) {
            $sale_item['sale_id'] = $newSale->id;
            SaleItem::create($sale_item);
        }

        CartItem::where('cart_id', $cart->id)->delete();
        $cart->delete();

        return back()->with('success', 'Sale Complete');
    }
}
