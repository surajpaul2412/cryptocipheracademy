@extends('layouts.backend.app')

@section('title','dashboard')

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
    <h3 class="heading">Add Register Form Course</h3>
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
      <form method="post" action="{{ route('admin.registerFormCourse.store') }}">
          @csrf
          <div class="form-group">
              <label class="text-dark" for="name">Course Name :</label>
              <input type="text" class="form-control" name="name" value="{{ old('name') }}"/>
          </div>
          <div class="form-group">
              <label class="text-dark" for="sort_order">Sort Order :</label>
              <input type="number" min="0" class="form-control" name="sort_order" value="{{ old('sort_order', 0) }}"/>
          </div>
          <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ old('is_active', 1) ? 'checked' : '' }}>
              <label class="form-check-label text-dark" for="is_active">Active</label>
          </div>
          <button type="submit" class="btn btn-primary">Add Register Form Course</button>
      </form>
  </div>
</div>
@endsection
