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
th{
	font-size: 13px !important;
	font-weight: bold !important;
	color: #6bb51e;
}
td{
	font-size: 13px !important;
}
button{
	border: none;
	background: transparent;
}
</style>
<div class="card uper">
  <div class="card-header">
    <h3 class="heading">Edit Video gallery Section</h3>
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
      <form method="post" action="{{ route('admin.videoGallery.update', $gallery->id) }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label class="text-dark" for="sort_by">Sort By:</label>
          <input type="text" class="form-control" name="sort_by" value="{{ $gallery->sort_by }}"/>
        </div>

        <div class="form-group">
          <label class="text-dark" for="name">Section Name :</label>
          <input type="text" class="form-control" name="name" value="{{ $gallery->name }}"/>
        </div>

        <div class="text-dark">
        	<label class="text-dark" for="name">Gallery Video Urls :</label>
        	<div class="form-group">
			  <div class="customer_records">
			    <input name="url[]" type="text" class="form-control">
			    <a class="extra-fields-customer btn btn-success" >Add More Urls</a>
			  </div>
			  <div class="customer_records_dynamic"></div>
			</div>
        </div>

        <button type="submit" class="btn btn-primary">Update Content</button>
      </form>
  </div>
</div>


<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script>
$('.extra-fields-customer').click(function() { $('.customer_records').clone().appendTo('.customer_records_dynamic');
  $('.customer_records_dynamic .customer_records').addClass('single remove');
  $('.single .extra-fields-customer').remove();
  $('.single').append('<a class="remove-field btn btn-danger btn-remove-customer">Remove Urls</a>');
  $('.customer_records_dynamic > .single').attr("class", "remove");

  $('.customer_records_dynamic input').each(function() {
    var count = 0;
    var fieldname = $(this).attr("name");
    $(this).attr('name', fieldname + count);
    count++;
  });
});

$(document).on('click', '.remove-field', function(e) {
  $(this).parent('.remove').remove();
  e.preventDefault();
});
</script>
@endsection