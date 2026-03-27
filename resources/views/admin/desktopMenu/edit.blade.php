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
    <h3 class="heading">Edit Desktop Menu For Section{{$id}}</h3>
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
      <form method="post" action="{{ route('admin.desktopMenu.update', $desktopMenu->id) }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label class="text-dark" for="sort_by">Sort By Section:</label>
          <input type="decimal" class="form-control" name="sort_by" value="{{ $desktopMenu->sort_by }}"/>
        </div>
        
        <button type="submit" class="btn btn-primary">Update Desktop Menu</button>
      </form>
  </div>
</div>
@endsection
