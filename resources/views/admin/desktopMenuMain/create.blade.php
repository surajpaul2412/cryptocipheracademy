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
    <h3 class="heading">Add Desktop Menu Main</h3>
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
      <form method="POST" action="{{ route('admin.desktopMenuMain.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label class="text-dark" for="slug">Slug :</label>
            <input type="text" class="form-control" name="slug"/>
          </div>

          <div class="form-group">
            <label class="text-dark" for="sort_by">Sort By :</label>
            <input type="text" class="form-control" name="sort_by"/>
          </div>

          <div class="form-group">
              <label class="text-dark" for="name">Main menu name :</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label class="text-dark" for="url">url :</label>
              <input type="text" class="form-control" name="url"/>
          </div>

          <div class="form-group">
              <label class="text-dark" for="desktop_menu_section_id">Select section :</label>
              <select class="form-control" name="desktop_menu_section_id">
              	<option value="">-- Please select a main menu --</option>
              	@foreach($sections as $index => $menu)
              	<option value="{{$menu->section_id}}">Section {{$menu->section_id}}</option>
              	@endforeach
              </select>
          </div>

          <button type="submit" class="btn btn-primary">Add new main menu</button>
      </form>
  </div>
</div>
@endsection
