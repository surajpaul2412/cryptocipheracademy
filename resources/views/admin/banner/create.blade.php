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
    <h3 class="heading">Add Banner</h3>
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
      <form method="POST" action="{{ route('admin.banner.store') }}" enctype="multipart/form-data">
          @csrf
          <label class="text-dark" for="image">Upload Desktop Banner:(934x292)px</label>
          <div class="form-group input-group">
            <input type="file" class="form-control imgInp custom-file-input" name="image" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01"/>
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            <div class="row">
              <div class="col-md-12" id="img_contain">
                <img id="previewImage" align='middle' src="" width="200px" class="pt-3"/>
              </div>
            </div>
          </div>

          <div class="form-group">
              <label class="text-dark" for="mobile_banner">Mobile Banner Image (300 x 250)px:</label>
              <input type="file" class="form-control" name="mobile_banner"/>
          </div>
          
          <button type="submit" class="btn btn-primary">Add Banner</button>
      </form>
  </div>
</div>
@endsection
