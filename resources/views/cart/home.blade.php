@extends('layout')

@section('content')
<div class="container">

    <h1 class="title mb-4 d-inline-block">My cart //</h1>
    <a href="{{ route("cart.history") }}" class="btn btn-primary d-inline-block mb-2" style="margin-left: 15px">Your Cart History</a>
    <div class="row mb-2">
        @foreach ($products as $product)
            @include('partials.cart.cart_box', ["product" => $product->cart, "quantity" => $product->quantity])
        @endforeach
    </div>
</div>

@endsection
