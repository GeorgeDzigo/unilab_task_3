<div class="col-md-6">
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col-auto d-none d-lg-block border shadow-sm">
            <img class="bd-placeholder-img" style="max-width:300px; max-height:300px;" height="80%" width="80%" src="{{ $product->photo_path }}" role="png" aria-label="Placeholder: Thumbnail" preserveaspectratio="xMidYMid slice" focusable="false">
        </div>
        <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary">{{ $product->title }}</strong>
            <strong class="d-inline-block mb-2 ">Quantity : {{ $quantity }}</strong>
            <a class="btn btn-primary" href="{{ route("cart.delete", $product->id) }}" onclick="event.preventDefault();
                            document.getElementById('delete{{ $product->id }}').submit();">
                Delete
            </a>
            <form id="delete{{$product->id}}" action="{{ route("cart.delete", $product->id) }}" method="POST" class="d-none">
               @csrf
            </form>
        </div>
    </div>
</div>
