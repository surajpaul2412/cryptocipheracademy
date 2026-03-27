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
    <h3 class="heading">Add Desktop Sub Main</h3>
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
      <form method="POST" action="{{ route('admin.desktopMenuSub.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label class="text-dark" for="slug">Slug :</label>
            <input type="text" class="form-control" name="slug" required/>
          </div>

          <div class="form-group">
            <label class="text-dark" for="sort_by">Sort By :</label>
            <input type="text" class="form-control" name="sort_by" required/>
          </div>

          <div class="form-group">
              <label class="text-dark" for="name">Main menu name :</label>
              <input type="text" class="form-control" name="name" required/>
          </div>

          <div class="form-group">
              <label class="text-dark" for="url">url :</label>
              <input type="text" class="form-control" name="url"/>
          </div>

          <div class="form-group">
              <label class="text-dark" for="desktop_main_menu_id">Select section :</label>
              <select class="form-control" name="desktop_main_menu_id" required>
              	<option value="">-- Please select a main menu --</option>
              	@foreach($menus as $index => $menu)
              	<option value="{{$menu->id}}">{{$menu->name}}</option>
              	@endforeach
              </select>
          </div>

          <button type="submit" class="btn btn-primary">Add new sub menu</button>
      </form>
  </div>
</div>
@endsection
