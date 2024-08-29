<div class="col mb-5">
    <div class="card h-100">
        <img class="card-img-top" src="{{ asset($product->image) }}" alt="image" />
        <div class="card-body p-4">
            <div class="text-center">
                <h5 class="fw-bolder">
                    <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                </h5>
                <span class="badge bg-primary">{{ $product->seller->name }}</span> <br>
                ${{ $product->sale_price }}
            </div>
        </div>
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('cart.store') }}?product_id={{$product->id}}">Add to cart</a></div>
        </div>
    </div>
</div>