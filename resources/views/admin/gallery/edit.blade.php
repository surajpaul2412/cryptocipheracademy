@extends('layouts.backend.app')

@section('title','dashboard')

@push('css')
@endpush

@section('content')
<style>
  .card-body{
    padding: 40px;
  }
  .form-control{
    border-bottom: 1px solid #888 !important;
  }
  .heading{
    color: #6bb51e;padding-top: 0px;text-align: center;
  }
</style>
<div class="card uper">
  <div class="card-header">
    <h3 class="heading">Edit Gallery Image</h3>
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br/>
    @endif
      <form method="post" action="{{ route('admin.gallery.update', $gallery->id) }}" enctype="multipart/form-data">
          @method('PATCH')
          @csrf
          <div class="form-group">
              <label class="text-dark" for="short_image1">Short Image 1 (300 x 300)px:</label>
              <input type="file" class="form-control" name="short_image1"/>
              <input type="hidden" name="hidden_image1" value="{{ $gallery->short_image1 }}">
          </div>

          <div class="form-group">
              <label class="text-dark" for="short_image2">Short Image 2 (300 x 300)px:</label>
              <input type="file" class="form-control" name="short_image2"/>
              <input type="hidden" name="hidden_image2" value="{{ $gallery->short_image2 }}">
          </div>

          <div class="form-group">
              <label class="text-dark" for="short_image3">Short Image 3 (300 x 300)px:</label>
              <input type="file" class="form-control" name="short_image3"/>
              <input type="hidden" name="hidden_image3" value="{{ $gallery->short_image3 }}">
          </div>

          <div class="form-group">
              <label class="text-dark" for="short_image4">Short Image 4 (300 x 300)px:</label>
              <input type="file" class="form-control" name="short_image4"/>
              <input type="hidden" name="hidden_image4" value="{{ $gallery->short_image4 }}">
          </div>
          
          <button type="submit" class="btn btn-primary">Edit image</button>
      </form>
  </div>
</div>
@endsection
