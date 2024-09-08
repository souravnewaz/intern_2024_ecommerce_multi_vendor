<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest('id')->limit(100)->get();
        //$products = Product::where('seller_id', auth()->user()->seller_id)->latest('id')->get();

        return view('seller.products.index', compact('products'));
    }

    public function create()
    {
        return view('seller.products.create');
    }

    public function store(Request $request)
    {
        return $request->all();
    }

    public function edit(Product $product, Request $request)
    {
        return view('seller.products.edit', compact('product'));
    }

    public function update(Product $product, Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'image' => 'nullable|image|mimes:png,jpg,jpeg',
        ]);

        $data['image'] = $product->image;

        if($request->hasFile('image')) {
            //$data['image'] = //upload image here;
        }

        $product->update($data);

        return redirect()->back()->with('success', 'Product updated successfully');
    }
}
