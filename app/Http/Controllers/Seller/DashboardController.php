<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['products_count'] = Product::where('seller_id', auth()->user()->seller_id)->count();
        $data['sales_count'] = Sale::where('seller_id', auth()->user()->seller_id)->count();
        $data['pending_sales_count'] = Sale::where('seller_id', auth()->user()->seller_id)->where('is_completed', 0)->count();
        $data['complete_sales_count'] = Sale::where('seller_id', auth()->user()->seller_id)->where('is_completed', 1)->count();

        return view('seller.dashboard', compact('data'));
    }
}
