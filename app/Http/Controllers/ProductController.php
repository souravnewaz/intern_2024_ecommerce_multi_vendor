<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        $relatedProducts = Product::inRandomOrder()->limit(8)->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }
}
