@section('headLink')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
@endsection
<div class="wrapper">
    <div id="page" class="container">
        <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="field">
                    <label for="title" class="label">Title</label>
                    <div class="control">
                        <input
                            type="text"
                            class="input @error("title") is-danger @enderror"
                            name="title"
                            id="title"
                            value="{{ $product == null ? old("title") : $product->title }}"
                        >
                        @error('title')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror

                    </div>
            </div>
            <br />
            <div class="field">
                    <label for="description" class="label">Enter product description</label>

                    <div class="control">
                        <textarea
                            class="textarea @error("description") is-danger @enderror"
                            name="description"
                            id="description"
                        >{{ $product == null ? old("description") : $product->description }}</textarea>

                        @error("description")
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
            </div>

            <div class="field">
                <label for="price" class="label">Price</label>
                <div class="control">
                    <input
                        type="number"
                        class="input @error("price") is-danger @enderror"
                        name="price"
                        id="price"
                        style="width: 60%;"
                        value="{{ $product == null ? old("price") : $product->price }}"
                    >
                    @error('price')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror

                </div>
            </div>

            <br />
            <div class="field">
                <div id="file-js-example" class="file has-name">
                    <label class="file-label">
                      <input class="file-input" type="file" name="photo_path">
                      <span class="file-cta">
                        <span class="file-icon">
                          <i class="fas fa-upload"></i>
                        </span>
                        <span class="file-label">
                          Choose Photo
                        </span>
                      </span>
                      <span class="file-name">
                        No Photo uploaded
                      </span>
                    </label>
                  </div>
                    @error("photo_path")
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
            </div>
            <br />
            <div class="field is-grouped">
                <div class="control">
                    <button type="submit" class="btn btn-primary">{{ $type }} your product</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    const fileInput = document.querySelector('#file-js-example input[type=file]');
    fileInput.onchange = () => {
      if (fileInput.files.length > 0) {
        const fileName = document.querySelector('#file-js-example .file-name');
        fileName.textContent = fileInput.files[0].name;
      }
    }
</script>
