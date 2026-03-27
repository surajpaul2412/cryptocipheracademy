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
      <form method="post" action="{{ route('admin.videoGalleryUrl.update', $video->id) }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label class="text-dark" for="sort_by">video Sort By :</label>
          <input type="text" class="form-control" name="sort_by" value="{{ $video->sort_by }}"/>
        </div>

      	<div class="form-group">
          <label class="text-dark" for="url">Video Url :</label>
          <input type="text" class="form-control" name="url" value="{{ $video->url }}"/>
      	</div>

      	<div class="form-group">
	        <label class="text-dark" for="video_gallery_id">Select Main Menu :</label>
	        <select class="form-control" name="video_gallery_id">
	          	@foreach($gallery as $index => $row)
	          	<?php
		            $selected = '';
		            if($row->id == $video->videoGallery->id)
		            { $selected = 'selected="selected"';}
		          ?>
		          <option value='{{ $row->id }}' {{$selected}} >{{ $row->name }}</option>
	          	@endforeach
	        </select>
    	  </div>

        <button type="submit" class="btn btn-primary">Update video</button>
      </form>
  </div>
</div>
@endsection
