@extends('layouts/app')


@section('content')
{{-- Header --}}

      <div class="main">
        <section class="jumbotron text-center" style="padding: 100px">
            <div class="container">
            <h1 class="jumbotron-heading">Here you can find any product you want</h1>
            <p class="lead text-muted">Haven't you published any product yet? What are you waiting for?</p>
            <p>
                <a href="{{ route("product.create") }}" class="btn btn-primary my-2">Create Product</a>
            </p>
            </div>
        </section>

        @yield('content')

</div>
    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
@endsection
