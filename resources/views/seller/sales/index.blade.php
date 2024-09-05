@extends('seller.layouts.app')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Sales</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Date</th>
                        <th scope="col">Products</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">Paid</th>
                        <th scope="col">Due</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $sale)
                    <tr>
                        <td>{{ $sale->id }}</td>
                        <td>{{ $sale->created_at }}</td>
                        <td>
                            @foreach ($sale->items as $item)
                            <div class="d-flex align-items-center mb-1">
                                <img src="{{ asset($item->product->image) }}" alt="" height="48px" width="48px" class="me-2">
                                <b>{{ $item->product->name }}</b> ({{ $item->quantity }} * {{ $item->unit_price }})
                            </div>
                            @endforeach
                        </td>
                        <td>{{ $sale->subtotal }}</td>
                        <td>{{ $sale->paid_amount }}</td>
                        <td>{{ $sale->due_amount }}</td>

                        <?php
                            $status = ($sale->is_completed == 1) ? 'complete' : 'pending'; //Ternary Operator
                        ?>
                        <td>
                            @if($status == 'complete')
                            <span class="badge bg-success">Complete</span>
                            @else
                            <span class="badge bg-warning">Pending</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('seller.sales.updateStatus', $sale->id) }}" method="POST">
                                @CSRF
                                <select name="status" class="form-select" onchange="this.form.submit()">
                                    <option value="complete" {{ $status == 'complete' ? 'selected' : '' }}>Complete</option>
                                    <option value="pending" {{ $status == 'pending' ? 'selected' : '' }}>Pending</option>
                                </select>
                            </form>
                        </td>
                    </tr>

                    @endforeach


                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection