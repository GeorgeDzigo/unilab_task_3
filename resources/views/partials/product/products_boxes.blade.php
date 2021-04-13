<div class="col-md-6">
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
    <div class="col p-4 d-flex flex-column position-static">
        <strong class="d-inline-block mb-2 text-primary">{{ $product->title }}</strong>
        <div class="mb-1">Price: {{ $product->price }}$</div>
        <div class="mb-1 text-muted">{{ $product->created_at }}</div>
        <p class="card-text mb-auto" style="overflow: overlay;height:88px;">{{ $product->description }}</p>
        @can('actions', $product)
            <a href="{{ route("product.edit", $product->id) }}" class="btn btn-primary m-1">Edit</a>
            <a href="{{ route("product.delete", $product->id) }}" class="btn btn-primary m-1">Delete</a>
        @endcan
        <a class="btn btn-primary m-1" href=""
        onclick="event.preventDefault();
                        document.getElementById('addtocart{{ $product->id }}').submit();">
            {{ "Add To Cart" }}
        </a>
        <form id="addtocart{{ $product->id }}" action="{{ route('cart.add', $product->id) }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
    <div class="col-auto d-none d-lg-block border shadow-sm">
        <img class="bd-placeholder-img" width="300" height="300" src="{{ $product->photo_path }}" role="png" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false" />
    </div>
    </div>
</div>
