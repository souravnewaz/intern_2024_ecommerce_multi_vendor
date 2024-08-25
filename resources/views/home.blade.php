@extends('layouts.app')
@section('content')

<header class="bg-dark py-4">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Shop in style</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
    </div>
</header>

@include('components.alerts')

<section class="pb-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h5>Top Sellers</h5>
        <div class="row mb-5">
            @foreach ($sellers as $seller)
            <div class="col-md-3 mb-2">
                <div class="card">
                    <img class="card-img-top" src="{{ asset($seller->image) }}" alt="image" />
                    <!-- <div class="card-body p-2">
                        <p class="mb-0">{{ $seller->name }}</p>
                    </div> -->
                </div>
            </div>
            @endforeach
        </div>
        <h5>Popular Products</h5>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($products as $product)
            <x-product-card :product="$product"/>
            @endforeach
        </div>
    </div>
</section>

@endsection