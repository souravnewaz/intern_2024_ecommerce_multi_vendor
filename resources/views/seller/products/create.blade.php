@extends('seller.layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="card-title">Create Product</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('seller.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Product Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Stock</label>
                    <input type="text" class="form-control" name="stock">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Regular Price</label>
                    <input type="text" class="form-control" name="regular_price">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Sale Price</label>
                    <input type="text" class="form-control" name="sale_price">
                </div>
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label>Image</label>
                <input type="file" class="form-control" name="image">
            </div>

            <button type="submit" class="btn btn-primary">Save</button>

        </form>
    </div>
</div>

@endsection