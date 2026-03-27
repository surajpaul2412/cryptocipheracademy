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
    <h3 class="heading">Add Video Gallery Section</h3>
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
      <form method="POST" action="{{ route('admin.videoGallery.store') }}" enctype="multipart/form-data">
          @csrf

          <div class="form-group">
              <label class="text-dark" for="name">video Gallery name :</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label class="text-dark" for="sort_by">Sort By :</label>
              <input type="text" class="form-control" name="sort_by"/>
          </div>


          <button type="submit" class="btn btn-primary">Add new video gallery section</button>
      </form>
  </div>
</div>
@endsection
