@extends('layouts.app')
@section('content')

<?php
$subtotal = 0;
?>

<div class="container mt-4">
    <h3>Shopping Cart</h3>
    <div class="row">
        <div class="col-md-8">

            @if(count($carts) == 0)
            <p>Your cart is empty</p>
            @else
            @foreach ($carts as $cart)
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title">
                        {{ $cart->seller->name }}
                    </h5>
                </div>
                <div class="card-body">
                    @foreach ($cart->items as $item)
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row" style="width: 60%;">
                                    <div class="d-flex align-items-center">
                                        <img class="me-3" src="{{ asset($item->product->image) }}" alt="image" style="width: 60px; height:60px;" />
                                        <h5>{{ $item->product->name }}</h5>
                                    </div>
                                </th>
                                <td style="width: 20%;">
                                    {{ $item->quantity }}
                                </td>
                                <td style="width: 20%;">
                                    <?php
                                    $total = $item->quantity * $item->product->sale_price;
                                    $subtotal += $total;
                                    ?>
                                    {{ $total }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @endforeach
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items-center">
                        <p> <b>Total: </b>{{ $subtotal }}</p>
                        <form action="{{ route('checkout', $cart->id) }}" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" name="address" class="form-control" required placeholder="Address">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Place Order</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>

@endsection