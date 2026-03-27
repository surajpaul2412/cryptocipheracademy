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
    <h3 class="heading">Edit Sub Menu</h3>
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
      <form method="post" action="{{ route('admin.submenu.update', $submenu->id) }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="form-group">
		  <label class="text-dark" for="slug">Label :</label>
		  <input type="text" class="form-control" name="slug" value="{{ $submenu->slug }}"/>
		</div>

		<div class="form-group">
          <label class="text-dark" for="name">Submenu Name :</label>
          <input type="text" class="form-control" name="name" value="{{ $submenu->name }}"/>
      	</div>

      	<div class="form-group">
          <label class="text-dark" for="url">url :</label>
          <input type="text" class="form-control" name="url" value="{{ $submenu->url }}"/>
      	</div>

      	<div class="form-group">
	        <label class="text-dark" for="menu_id">Select Main Menu :</label>
	        <select class="form-control" name="menu_id">
	          	@foreach($menus as $index => $menu)
	          	<?php
		            $selected = '';
		            if($menu->id == $submenu->menu->id)
		            { $selected = 'selected="selected"';}
		        ?>
		        <option value='{{ $menu->id }}' {{$selected}} >{{ $menu->name }}</option>
	          	@endforeach
	        </select>
	    </div>

        <button type="submit" class="btn btn-primary">Update submenu</button>
      </form>
  </div>
</div>
@endsection
