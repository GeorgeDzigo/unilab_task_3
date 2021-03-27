<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    @yield('headLink')
</head>
<body>
{{-- Header --}}
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
          <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-4">Products</span>
          </a>

          <ul class="nav nav-pills">
            <li class="nav-item"><a href="{{ route("home") }}" class="nav-link {{ Request::is("/") ? "active" : "" }}">Home</a></li>
            <li class="nav-item"><a href="{{ route("product.create") }}" class="nav-link {{ Request::is("/product/*") ? "active" : "" }}">Create Product</a></li>
          </ul>
        </header>
      </div>
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
</body>
</html>
