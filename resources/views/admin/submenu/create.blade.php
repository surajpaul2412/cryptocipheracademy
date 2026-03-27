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
    <h3 class="heading">Add Submenu</h3>
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
      <form method="POST" action="{{ route('admin.submenu.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              <label class="text-dark" for="slug">Label :</label>
              <input type="text" class="form-control" name="slug"/>
          </div>

          <div class="form-group">
              <label class="text-dark" for="name">submenu name :</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label class="text-dark" for="url">url :</label>
              <input type="text" class="form-control" name="url"/>
          </div>

          <div class="form-group">
              <label class="text-dark" for="menu_id">Select Main Menu :</label>
              <select class="form-control" name="menu_id">
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
