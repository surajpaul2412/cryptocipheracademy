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
    <h3 class="heading">Edit News</h3>
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
      <form method="post" action="{{ route('admin.newsroom.update', $news->id) }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label class="text-dark" for="slug">Seo Url : <sup class="text-danger">(don't leave any space between)</sup></label>
          <input type="text" class="form-control" name="slug" value="{{ $news->slug }}"/>
        </div>

        <div class="form-group">
    		  <label class="text-dark" for="title">Title :</label>
    		  <input type="text" class="form-control" name="title" value="{{ $news->title }}"/>
    		</div>
		    <div class="form-group">
          <label class="text-dark" for="content">Description :</label>
          <textarea id="summernote" class="form-control" name="content">{{ $news->content }}</textarea>
      	</div>
        <label class="text-dark" for="image">Upload Image (822 x 314)px:</label>
        <div class="form-group input-group">
          <label class="text-dark" for="image">Upload Image:</label>
          <input type="file" class="form-control imgInp custom-file-input" name="image" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01"/>
          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
          <div class="row">
            <div class="col-md-3" id="img_contain">
              <img id="previewImage" align='middle' src="{{env('image_url')}}/news/{{$news->image}}" width="200px"  class="pt-3"/>
            </div>
          </div>
          <input type="hidden" name="hidden_image" value="{{ $news->image }}">
        </div>

        <div class="form-group">
          <div class="multi-field-wrapper mt-3">
            <div class="multi-fields">
              @if($news->newstags->count())
              @foreach($news->newstags as $tag)
              <div class="multi-field d-flex">
                <input type="text" class="form-control" name="tags[]" placeholder="Give any tag (optional)" value="{{$tag->tag}}">
                <button type="button" class="remove-field" style="background:#fff;border:none;color: red;cursor: pointer;outline: none;">x</button>
              </div>
              @endforeach
              @else
                <div class="multi-field d-flex">
                  <input type="text" class="form-control" name="tags[]" placeholder="Give any tag (optional)">
                  <button type="button" class="remove-field" style="background:#fff;border:none;color: red;cursor: pointer;outline: none;">x</button>
                </div>
              @endif
            </div>
            <button type="button" class="btn btn-info add-field-left">Add more</button>
          </div>
        </div>

        <hr>
        <div class="form-group">
            <label class="text-dark" for="meta_title">Meta Title :</label>
            <input type="text" class="form-control" name="meta_title" value="{{$news->meta_title}}" />
        </div>
        <div class="form-group">
          <label class="text-dark" for="meta_description">Meta Description :</label>
          <textarea id="summernote2" class="form-control" name="meta_description" value="{{ $news->meta_description }}">{{ $news->meta_description }}</textarea>
        </div>

        <div class="form-group">
          <label class="text-dark" for="meta_script">Meta Script :</label>
          <textarea id="summernote3" class="form-control" name="meta_script" value="{{ $news->meta_script }}">{{ $news->meta_script }}</textarea>
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

  $('#summernote3').summernote({
    placeholder: 'Edit Script',
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
  $('.multi-field-wrapper').each(function() {
      var $wrapper = $('.multi-fields', this);
      $(".add-field-left", $(this)).click(function(e) {
          $('.multi-field:first-child', $wrapper).clone(true).appendTo($wrapper).find('input').val('').focus();
      });
      $('.multi-field .remove-field', $wrapper).click(function() {
          if ($('.multi-field', $wrapper).length > 1)
              $(this).parent('.multi-field').remove();
      });
  });
</script>
@endsection
