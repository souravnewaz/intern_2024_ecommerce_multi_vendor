@extends('seller.layouts.app')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Products</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Product</th>
                        <th scope="col">Regular Price</th>
                        <th scope="col">Sale Price</th>
                        <th scope="col">Stock In</th>
                        <th scope="col">Stock Out</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset($product->image) }}" alt="" height="48px" width="48px" class="me-2">
                                <b>{{ $product->name }}</b>
                            </div>
                        </td>
                        <td>{{ $product->regular_price }}</td>
                        <td>{{ $product->sale_price }}</td>
                        <td>{{ $product->stock_in }}</td>
                        <td>{{ $product->stock_out }}</td>
                        <td>
                            <a href="{{ route('seller.products.edit', $product->id)  }}" class="btn btn-info btn-sm">Edit</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection