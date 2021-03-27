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
                            value="{{ Request::has("edit") ? $product->title : "". old("title") }}"
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
                        >{{ Request::has("description") ? $product->title : "". old("description") }}</textarea>
                        @error("description")
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
