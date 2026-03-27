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
    <h3 class="heading">Edit Team</h3>
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
      <form method="post" action="{{ route('admin.team.update', $team->id) }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label class="text-dark" for="sort_by">Order By :</label>
          <input type="text" class="form-control" name="sort_by" value="{{ $team->sort_by }}"/>
        </div>

        <div class="form-group">
          <label class="text-dark" for="name">Name :</label>
          <input type="text" class="form-control" name="name" value="{{ $team->name }}"/>
        </div>

        <div class="form-group">
          <label class="text-dark" for="designation">Designation :</label>
          <input type="text" class="form-control" name="designation" value="{{ $team->designation }}"/>
        </div>

        <div class="form-group">
          <label class="text-dark" for="content">Description :</label>
          <textarea id="summernote" class="form-control" name="content">{{ $team->content }}</textarea>
        </div>

        <label class="text-dark" for="image">Upload Image (307 x 244)px:</label>
        <div class="form-group input-group">
          <label class="text-dark" for="image">Upload Image:</label>
          <input type="file" class="form-control imgInp custom-file-input" name="image" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01"/>
          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
          <div class="row">
            <div class="col-md-3" id="img_contain">
              <img id="previewImage" align='middle' src="{{env('image_url')}}/team/{{$team->image}}" width="200px"  class="pt-3"/>
            </div>
          </div>
          <input type="hidden" name="hidden_image" value="{{ $team->image }}">
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
