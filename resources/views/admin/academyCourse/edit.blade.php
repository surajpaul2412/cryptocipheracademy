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
    <h3 class="heading">Edit Academy Course</h3>
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
      <form method="post" action="{{ route('admin.academyCourse.update', $academyCourse->id) }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label class="text-dark" for="heading">Heading :</label>
          <input type="text" class="form-control" name="heading" value="{{ old('heading', $academyCourse->heading) }}"/>
        </div>
        <div class="form-group">
          <label class="text-dark" for="content">Content :</label>
          <textarea id="summernote" class="form-control" name="content">{{ old('content', $academyCourse->content) }}</textarea>
        </div>
        <label class="text-dark" for="image">Upload Icon:</label>
        <div class="form-group input-group">
          <label class="text-dark" for="image">Upload Image:</label>
          <input type="file" class="form-control imgInp custom-file-input" name="image" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01"/>
          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
          <div class="row">
            <div class="col-md-3" id="img_contain">
              <img id="previewImage" align='middle' src="{{ URL('/') }}/images/academyCourse/{{ $academyCourse->image }}" width="100px"  class="pt-3"/>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="text-dark" for="url">Url :</label>
          <input type="text" class="form-control" name="url" value="{{ old('url', $academyCourse->url) }}"/>
        </div>

        <hr>
        <div class="form-group">
          <label class="text-dark" for="slider_heading">Home Slider Heading :</label>
          <input type="text" class="form-control" name="slider_heading" value="{{ old('slider_heading', $academyCourse->slider_heading) }}"/>
        </div>

        <div class="form-group">
          <label class="text-dark" for="slider_duration">Home Slider Duration :</label>
          <input type="text" class="form-control" name="slider_duration" value="{{ old('slider_duration', $academyCourse->slider_duration) }}"/>
        </div>

        <div class="form-group">
          <label class="text-dark" for="banner_image">Home Slider Banner Image :</label>
          <input type="file" class="form-control" name="banner_image"/>
          @if($academyCourse->banner_image)
          <div class="row">
            <div class="col-md-3 pt-3">
              <img src="{{ URL('/') }}/images/academyCourse/{{ $academyCourse->banner_image }}" width="140px">
            </div>
          </div>
          @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Content</button>
      </form>
  </div>
</div>

<script>
  $('#summernote').summernote({
    placeholder: 'Edit Description',
    tabsize: 2,
    height: 150,
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'clear']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'video']],
      ['view', ['fullscreen', 'codeview', 'help']]
    ]
  });
</script>
@endsection
