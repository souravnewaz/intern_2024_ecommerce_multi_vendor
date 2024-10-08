<?php
$cart_count = 0;
$cart_ids = \App\Models\Cart::where('user_id', auth()->id())->pluck('id')->toArray();
if(!empty($cart_ids)) {
    $cart_count = \App\Models\CartItem::whereIn('cart_id', $cart_ids)->count();
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="/">{{ env('APP_NAME') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/product">All Products</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                        <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                <a class="btn btn-outline-dark" href="{{ route('cart.index') }}">
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill">{{ $cart_count }}</span>
                </a>
            </form>
            @guest
            <div class="d-flex">
                <a href="/login" class="btn btn-light border mx-2">Login</a>
                <a href="/register" class="btn btn-primary">Register</a>
                <a href="{{ route('sellerRegistration') }}" class="btn btn-primary ms-1">Join as Seller</a>
            </div>
            @endguest

            @if(auth()->check())
            <span class="mx-2">{{ auth()->user()->name }}</span>
            <a href="{{ route('orders.index') }}">Orders</a>
            <a href="{{ route('logout') }}" class="mx-2">Logout</a>
            @endif

        </div>
    </div>
</nav>