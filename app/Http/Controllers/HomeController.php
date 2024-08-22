<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Seller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $sellers = Seller::limit(4)->get();

        $products = Product::limit(12)->get();

        return view('home', compact('sellers', 'products'));
    }
}
