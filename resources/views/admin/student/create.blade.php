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
    color: #333;padding-top: 0px;text-align: center;
  }
</style>
<div class="card uper">
  <div class="card-header">
    <h3 class="heading">Add New student</h3>
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
      <form method="post" action="{{ route('admin.student.store') }}">
          @csrf
          <div class="form-group">
              <label class="text-dark" for="name">Name :</label>
              <input type="text" class="form-control" name="name" required/>
          </div>
          <div class="form-group">
              <label class="text-dark" for="email">Email :</label>
              <input type="email" class="form-control" name="email" required/>
          </div>
          <div class="form-group">
              <label class="text-dark" for="phone">Mobile Number :</label>
              <input type="text" class="form-control" name="phone" required/>
          </div>
          <div class="form-group">
              <label class="text-dark" for="password">Password :</label>
              <input type="text" class="form-control" name="password" required/>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection