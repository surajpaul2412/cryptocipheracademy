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
    <h3 class="heading">Add New download</h3>
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
      <form method="post" action="{{ route('admin.download.store') }}">
          @csrf
          <div class="form-group">
              <label class="text-dark" for="name">Name :</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label class="text-dark" for="sort_by">Order By :</label>
              <input type="text" class="form-control" name="sort_by"/>
          </div>
          <div class="form-group">
              <label class="text-dark" for="content">Display Content :</label>
              <textarea id="summernote" class="form-control" name="content"></textarea>
          </div>
          <div class="form-group">
              <label class="text-dark" for="file">Description :</label>
              <textarea id="summernote1" class="form-control" name="file"></textarea>
          </div>
          <div class="form-group">
              <label class="text-dark" for="path">File name :</label>
              <input type="text" class="form-control" name="path"/>
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
  $('#summernote1').summernote({
    placeholder: 'Add Description',
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