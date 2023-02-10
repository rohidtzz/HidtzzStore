@extends('home.layouts.master')
@extends('home.layouts.navbar')
@section('style')
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js"></script>
@endsection
@section('content')

<div class="container">
    <form method="POST" action="{{ url('/admin/product/update') }}" enctype="multipart/form-data">
        @csrf

        <input type="hidden" value="{{ $product->id }}" name="id">

        <div class="mb-3">
            <label  class="form-label">Name:</label>
            <input value="{{ $product->name }}" type="text" class="form-control" name="name" required>
        </div>

        <div class="mb-3">
            <label  class="form-label">Price:</label>
            <input value="{{ $product->price }}" type="number" class="form-control" name="price" required>
        </div>

        <div class="mb-3">
            <label  class="form-label">Stock:</label>
            <input value="{{ $product->stock }}" type="number" class="form-control" name="stock" required>
        </div>

        <div class="mb-3">
            <label  class="form-label">Image:</label>
            <input type="file" class="form-control" name="image">
        </div>

        <label for="label-form">Description: </label>
        <textarea class="form-control" id="editor" name="description" >{!! $product->description !!}</textarea>


        <br><br>
        <input type="submit" name="submit" value="Submit" class="btn btn-primary" />
    </form>
</div>
<br><br><br><br>
{{-- <div class="card">
    <div class="card-body">

    </div>
</div> --}}

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>

<script src="{{ asset('ckeditor5/ckeditor.js') }}"></script>
@endsection

