@extends('layout')

@section('content')
<div class="container">
    <div class="row mb-2">
        @if ($products->count() != 0)
            @foreach ($products as $product)
                @include('partials.product.products_boxes')
            @endforeach
        @else
            There are no products
    @endif
    </div>
    {{ $products->links('pagination::bootstrap-4') }}
</div>
@endsection
