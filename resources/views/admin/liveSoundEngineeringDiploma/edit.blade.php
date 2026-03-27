@extends('layouts.backend.app')

@section('content')
<style>
  .card-body {
    padding: 40px;
  }
  .form-control {
    border-bottom: 1px solid #888 !important;
  }
  .heading {
    color: #333;
    padding-top: 0px;
    text-align: center;
  }
</style>

<div class="card uper">
  <div class="card-header">
    <h3 class="heading">Edit Live Sound Engineering Diploma Content</h3>
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

    <form method="post" action="{{ route('admin.liveSoundEngineeringDiploma.update', $liveSoundEngineering->id) }}" enctype="multipart/form-data">
      @method('PATCH')
      @csrf

      <div class="form-group">
        <label class="text-dark" for="content">Content :</label>
        <textarea id="summernote" class="form-control" name="content">{{ $liveSoundEngineering->content }}</textarea>
      </div>

      <div class="form-group">
        <label class="text-dark" for="meta_title">Meta Title :</label>
        <input type="text" class="form-control" name="meta_title" value="{{ $liveSoundEngineering->meta_title ?? '' }}" />
      </div>

      <div class="form-group">
        <label class="text-dark" for="meta_keyword">Meta Keyword :</label>
        <textarea id="summernote1" class="form-control" name="meta_keyword">{{ $liveSoundEngineering->meta_keyword ?? '' }}</textarea>
      </div>

      <div class="form-group">
        <label class="text-dark" for="meta_description">Meta Description :</label>
        <textarea id="summernote2" class="form-control" name="meta_description">{{ $liveSoundEngineering->meta_description ?? '' }}</textarea>
      </div>

      <button type="submit" class="btn btn-primary">Update Content</button>
    </form>
  </div>
</div>

<script>
  $('#summernote').summernote({
    placeholder: 'Edit content',
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

  $('#summernote1').summernote({
    placeholder: 'Edit Keyword',
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

  $('#summernote2').summernote({
    placeholder: 'Edit description',
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
