@extends('layouts.backend.app')

@section('content')
<style>
  .card-body {
    padding: 40px;
  }
  .form-control {
    border-bottom: 1px solid #888 !important;
  }
  .heading {
    color: #333; padding-top: 0px; text-align: center;
  }
</style>

<div class="card uper">
  <div class="card-header">
    <h3 class="heading">Edit Point</h3>
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

    <form method="post" action="{{ route('admin.musicProductionDiplomaSound.update', $musicProductionDiplomaSound->id) }}" enctype="multipart/form-data">
      @method('PATCH')
      @csrf
      <div class="form-group">
        <label class="text-dark" for="content">Point :</label>
        <input type="text" class="form-control" name="content" value="{{ $musicProductionDiplomaSound->content }}" required />
      </div>

      <button type="submit" class="btn btn-primary">Update Content</button>
    </form>
  </div>
</div>
@endsection
