<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $sales = Sale::where('user_id', auth()->id())->with('seller', 'items.product')->paginate(15);

        return view('orders', compact('sales'));
    }
}
