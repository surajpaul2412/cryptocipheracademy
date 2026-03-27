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
    <h3 class="heading">Add menu</h3>
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
      <form method="POST" action="{{ route('admin.menu.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              <label class="text-dark" for="sort_by">Sort By :</label>
              <input type="decimal" class="form-control" name="sort_by"/>
          </div>

          <div class="form-group">
              <label class="text-dark" for="slug">Label :</label>
              <input type="text" class="form-control" name="slug"/>
          </div>

          <div class="form-group">
              <label class="text-dark" for="name">Menu name :</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label class="text-dark" for="url">url :</label>
              <input type="text" class="form-control" name="url"/>
          </div>

          <button type="submit" class="btn btn-primary">Add new</button>
      </form>
  </div>
</div>
@endsection
