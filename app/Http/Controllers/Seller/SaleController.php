<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('items')
            //->where('seller_id', auth()->user()->seller_id)
            ->orderBy('id', 'DESC')
            ->get();

        return view('seller.sales.index', compact('sales'));
    }

    public function updateStatus(Sale $sale, Request $request)
    {
        $sale->is_completed = $request->status == 'complete' ? 1 : 0;
        $sale->save();

        return redirect()->back()->with('success', 'Status updated');
    }
}
