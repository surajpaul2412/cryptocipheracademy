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
    <h3 class="heading">Edit manager</h3>
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('admin.manager.update', $user->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label class="text-dark" for="name">Name:</label>
          <input type="text" class="form-control" name="name" value="{{ $user->name }}" />
        </div>
        <div class="form-group">
          <label class="text-dark" for="email">Email:</label>
          <input type="text" class="form-control" name="email" value="{{ $user->email }}" />
        </div>
        <div class="form-group">
          <label class="text-dark" for="password">Password:</label>
          <input type="text" class="form-control" name="password" placeholder="Enter new password*" />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection