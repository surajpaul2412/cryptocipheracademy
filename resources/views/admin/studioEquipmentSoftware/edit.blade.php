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
    <h3 class="heading">Edit menu</h3>
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
      <form method="post" action="{{ route('admin.studioEquipmentSoftware.update', $studioEquipmentSoftware->id) }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="form-group">
    		  <label class="text-dark" for="label">Menu Label :</label>
    		  <input type="text" class="form-control" name="label" value="{{ $studioEquipmentSoftware->label }}"/>
    		</div>

        <div class="form-group">
          <label class="text-dark" for="option1">Menu 1 :</label>
          <input type="text" class="form-control" name="option1" value="{{ $studioEquipmentSoftware->option1 }}"/>
        </div>
        <div class="form-group">
          <label class="text-dark" for="option2">Menu 2 :</label>
          <input type="text" class="form-control" name="option2" value="{{ $studioEquipmentSoftware->option2 }}"/>
        </div>
        <div class="form-group">
          <label class="text-dark" for="option3">Menu 3 :</label>
          <input type="text" class="form-control" name="option3" value="{{ $studioEquipmentSoftware->option3 }}"/>
        </div>
        <div class="form-group">
          <label class="text-dark" for="option4">Menu 4 :</label>
          <input type="text" class="form-control" name="option4" value="{{ $studioEquipmentSoftware->option4 }}"/>
        </div>
        <div class="form-group">
          <label class="text-dark" for="option5">Menu 5 :</label>
          <input type="text" class="form-control" name="option5" value="{{ $studioEquipmentSoftware->option5 }}"/>
        </div>


        <button type="submit" class="btn btn-primary">Update menu</button>
      </form>
  </div>
</div>
@endsection
