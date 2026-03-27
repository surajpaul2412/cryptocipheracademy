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
    <h3 class="heading">Add Menu</h3>
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
      <form method="POST" action="{{ route('admin.studioEquipmentHardware.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              <label class="text-dark" for="label">Menu Label :</label>
              <input type="text" class="form-control" name="label"/>
          </div>

          <div class="form-group">
              <label class="text-dark" for="option1">Menu 1 :</label>
              <input type="text" class="form-control" name="option1"/>
          </div>
          <div class="form-group">
              <label class="text-dark" for="option2">Menu 2 :</label>
              <input type="text" class="form-control" name="option2"/>
          </div>
          <div class="form-group">
              <label class="text-dark" for="option3">Menu 3 :</label>
              <input type="text" class="form-control" name="option3"/>
          </div>
          <div class="form-group">
              <label class="text-dark" for="option4">Menu 4 :</label>
              <input type="text" class="form-control" name="option4"/>
          </div>
          <div class="form-group">
              <label class="text-dark" for="option5">Menu 5 :</label>
              <input type="text" class="form-control" name="option5"/>
          </div>

          <button type="submit" class="btn btn-primary">Add Menu</button>
      </form>
  </div>
</div>
@endsection
