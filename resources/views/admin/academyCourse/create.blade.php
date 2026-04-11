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
    color: #333;padding-top: 0px;text-align: center;
  }
</style>
<div class="card uper">
  <div class="card-header">
    <h3 class="heading">Add New Academy course</h3>
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
      <form method="post" action="{{ route('admin.academyCourse.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              <label class="text-dark" for="heading">Heading :</label>
              <input type="text" class="form-control" name="heading" value="{{ old('heading') }}"/>
          </div>
          <div class="form-group">
              <label class="text-dark" for="content">Content :</label>
              <textarea id="summernote" class="form-control" name="content">{{ old('content') }}</textarea>
          </div>
          <div class="form-group">
              <label class="text-dark" for="url">Button url :</label>
              <input type="text" class="form-control" name="url" value="{{ old('url') }}"/>
          </div>
          <div class="form-group">
              <label class="text-dark" for="image">Icon :</label>
              <input type="file" class="form-control" name="image"/>
          </div>
          <hr>
          <div class="form-group">
              <label class="text-dark" for="slider_heading">Home Slider Heading :</label>
              <input type="text" class="form-control" name="slider_heading" value="{{ old('slider_heading') }}"/>
          </div>
          <div class="form-group">
              <label class="text-dark" for="slider_duration">Home Slider Duration :</label>
              <input type="text" class="form-control" name="slider_duration" value="{{ old('slider_duration') }}" placeholder="Example: 12 Months"/>
          </div>
          <div class="form-group">
              <label class="text-dark" for="banner_image">Home Slider Banner Image :</label>
              <input type="file" class="form-control" name="banner_image"/>
              <small class="text-muted">Upload this image if you want this main course to appear in the home page slider after Fast Forward courses.</small>
          </div>
          <button type="submit" class="btn btn-primary">Add Download</button>
      </form>
  </div>
</div>

<script>
  $('#summernote').summernote({
    placeholder: 'Add Content',
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
