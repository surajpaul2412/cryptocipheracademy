@extends('layouts.backend.app')

@section('content')
<style>
  .card-body{
    padding: 40px;
  }
  .form-control{
    border-bottom: 1px solid #888 !important;
  }
  .heading{
    color: #333;padding-top: 0px;text-align: center;
  }
</style>
<div class="card uper">
  <div class="card-header">
    <h3 class="heading">Edit banner</h3>
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
      <form method="post" action="{{ route('admin.banner.update', $banner->id) }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf

        <label class="text-dark" for="image">Upload Desktop Banner:(934x292)px</label>
        <div class="form-group input-group">
          <input type="file" class="form-control imgInp custom-file-input" name="image" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01"/>
          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
          <div class="row">
            <div class="col-md-3" id="img_contain">
              <img id="previewImage" align='middle' src="{{env('image_url')}}/banner/{{$banner->image}}" width="400px"  class="pt-3"/>
            </div>
          </div>
          <input type="hidden" name="hidden_image" value="{{ $banner->image }}">
        </div>

        <div class="form-group">
            <label class="text-dark" for="mobile_banner">Upload Mobile Banner:(300x250)px</label>
            <input type="file" class="form-control" name="mobile_banner"/>
            <input type="hidden" name="hidden_mobile_banner" value="{{ $banner->mobile_banner }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Banner</button>
      </form>
  </div>
</div>
@endsection
