@extends('layouts.app')
@section('content')

<div class="h-100 d-flex align-items-center justify-content-center">
    <div class="card col-md-8 col-lg-4">
        <div class="card-header">
            <h5 class="card-title">Login</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password">
                </div>

                @include('components.alerts')
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>

@endsection