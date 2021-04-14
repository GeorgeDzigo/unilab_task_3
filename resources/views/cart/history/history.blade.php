@extends('layout')

@section('content')
<div class="container">
    <h1 class="title mb-4">Your Cart History</h1>

    <div class="row mb-2">
        @foreach ($products as $product)
            @include('partials.cart.cart_box', [
                "product" => $product->productBelongsTo,
                "quantity" => $product->quantity,
                "history" => true
                ])
        @endforeach
    </div>
</div>

@endsection
