@extends('seller.layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="card-title">Edit Product</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('seller.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Product Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Stock</label>
                    <input type="text" class="form-control" name="stock_in"  value="{{ $product->stock_in }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Regular Price</label>
                    <input type="text" class="form-control" name="regular_price"  value="{{ $product->regular_price }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Sale Price</label>
                    <input type="text" class="form-control" name="sale_price" value="{{ $product->sale_price }}">
                </div>
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control">{{ $product->description }}</textarea>
            </div>

            <div class="mb-3">
                <img src="{{ asset($product->image) }}" alt="" height="100px" width="100px">
                <br>
                <label>Image</label>
                <input type="file" class="form-control" name="image">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>

        </form>
    </div>
</div>

@endsection