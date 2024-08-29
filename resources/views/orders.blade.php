@extends('layouts.app')
@section('content')

<div class="container my-5">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Orders</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Items</th>
                        <th scope="col">Total</th>
                        <th scope="col">Paid</th>
                        <th scope="col">Due</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $sale)
                    <tr>
                        <td>{{ $sale->created_at->format('d F Y h:i A') }}</td>
                        <td>
                            @foreach ($sale->items as $item)
                            <p><b>{{ $item->product->name }}</b> ({{ $item->quantity }} * {{ $item->unit_price }}) | Total: {{ $item->total_price }}</p>

                            @endforeach
                        </td>
                        <td>{{ $sale->subtotal }}</td>
                        <td>{{ $sale->paid_amount }}</td>
                        <td>{{ $sale->due_amount }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $sales->links() }}
        </div>
    </div>
</div>

@endsection