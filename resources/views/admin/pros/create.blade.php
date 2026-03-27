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
    <h3 class="heading">Add Pros</h3>
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
      <form method="POST" action="{{ route('admin.pros.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              <label class="text-dark" for="sort_by">Sort By :</label>
              <input type="decimal" class="form-control" name="sort_by"/>
          </div>
          
          <div class="form-group">
              <label class="text-dark" for="name">Name :</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label class="text-dark" for="brief">Brief :</label>
              <input type="text" class="form-control" name="brief"/>
          </div>

          <div class="form-group">
              <label class="text-dark" for="description">Description :</label>
              <textarea id="summernote" class="form-control" name="description"></textarea>
          </div>
          
          <label class="text-dark" for="image">Upload Image:(600x600px)</label>
          <div class="form-group input-group">
            <label class="text-dark" for="image">Upload Image:</label>
            <input type="file" class="form-control imgInp custom-file-input" name="image" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01"/>
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            <div class="row">
              <div class="col-md-12" id="img_contain">
                <img id="previewImage" align='middle' src="" width="90px"  class="pt-3"/>
              </div>
            </div>
          </div>

          <div class="form-group">
              <label class="text-dark" for="workings">Workings :</label>
              <textarea id="summernote1" class="form-control" name="workings"></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Add Pro</button>
      </form>
  </div>
</div>

<script>
  $('#summernote').summernote({
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
