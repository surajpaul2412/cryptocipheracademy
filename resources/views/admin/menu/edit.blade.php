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
    <h3 class="heading">Edit Menu</h3>
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
      <form method="post" action="{{ route('admin.menu.update', $menu->id) }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="form-group">
              <label class="text-dark" for="sort_by">Sort By :</label>
              <input type="decimal" class="form-control" name="sort_by" value="{{ $menu->sort_by }}"/>
          </div>

        <div class="form-group">
    		  <label class="text-dark" for="slug">Label :</label>
    		  <input type="text" class="form-control" name="slug" value="{{ $menu->slug }}"/>
    		</div>

        <div class="form-group">
          <label class="text-dark" for="name">Name :</label>
          <input type="text" class="form-control" name="name" value="{{ $menu->name }}"/>
        </div>

        <div class="form-group">
          <label class="text-dark" for="url">Url :</label>
          <input type="text" class="form-control" name="url" value="{{ $menu->url }}"/>
        </div>
        
        <button type="submit" class="btn btn-primary">Update Menu</button>
      </form>
  </div>
</div>
@endsection
