@extends('layout')

@section('content')
<div class="container">
    <h1 class="title mb-4">My cart</h1>

    <div class="row mb-2">
        @foreach ($products as $product)
            @include('products.partials.cart_box')
        @endforeach
    </div>
</div>

@endsection
