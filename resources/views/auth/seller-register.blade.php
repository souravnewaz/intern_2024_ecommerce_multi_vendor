@extends('layouts.app')
@section('content')

<div class="container my-5">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Seller Registration</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('sellerRegistration') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Shop Name</label>
                        <input type="text" class="form-control" name="shop_name">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="phone">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                    <div class="col-12 mb-3">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                </div>


                @include('components.alerts')
                <button type="submit" class="btn btn-primary">Signup</button>
            </form>
        </div>
    </div>

</div>

@endsection