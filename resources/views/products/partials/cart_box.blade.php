<div class="col-md-6">
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col-auto d-none d-lg-block border shadow-sm">
            <img class="bd-placeholder-img" style="max-width:400px; max-height:400px;" height="100%" width="100%" src="{{ $product->photo_path }}" role="png" aria-label="Placeholder: Thumbnail" preserveaspectratio="xMidYMid slice" focusable="false">
        </div>
        <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary">{{$product->title}}</strong>
            <a class="btn btn-primary" href="" onclick="event.preventDefault();
                            document.getElementById('addtocart{{ $product->id }}').submit();">
                Delete
            </a>
            <form id="addtocart5" action="http://127.0.0.1:8000/product/addToCart/5" method="POST" class="d-none">
               @csrf
            </form>
        </div>
    </div>
</div>
