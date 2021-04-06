@extends('layout')

@section('content')

<div class="container">
    <div class="row mb-2">
        @foreach ($products as $product)
            @include('products.partials.cart_box')
        @endforeach
    </div>
</div>

@endsection
