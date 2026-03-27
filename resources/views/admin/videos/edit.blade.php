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
    <h3 class="heading">Edit Video</h3>
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
      <form method="post" action="{{ route('admin.videos.update', $videos->id) }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label class="text-dark" for="module_id">Module :</label>
            <select class="form-control" name="module_id">
              @foreach($modules as $index => $module)
              <?php
                $selected = '';
                if($module->id == $videos->module->id)
                { $selected = 'selected="selected"';}
              ?>
              <option value='{{ $module->id }}' {{$selected}} >{{ $module->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
          <label class="text-dark" for="title">title:</label>
          <input type="text" class="form-control" name="title" value="{{ $videos->title }}" />
        </div>

        <div class="form-group">
    		  <label class="text-dark" for="description">Description :</label>
          <textarea id="summernote" class="form-control" name="description" value="{{ $videos->description }}">{{ $videos->description }}</textarea>
    		</div>

        <div class="form-group">
          <label class="text-dark" for="video_url">Video Url:</label>
          <input type="text" class="form-control" name="video_url" value="{{ $videos->video_url }}" />
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
</script>
@endsection
