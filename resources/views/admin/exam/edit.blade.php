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
    <h3 class="heading">Edit exam</h3>
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
      <form method="post" action="{{ route('admin.exam.update', $exam->id) }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label class="text-dark" for="module">Module :</label>
          <input type="text" class="form-control" name="module" value="{{ $exam->module }}"/>
        </div>

        <div class="form-group">
          <label class="text-dark" for="structure">Structure :</label>
          <input type="text" class="form-control" name="structure" value="{{ $exam->structure }}"/>
        </div>

        <div class="form-group">
          <label class="text-dark" for="marks">Marks :</label>
          <input type="text" class="form-control" name="marks" value="{{ $exam->marks }}"/>
        </div>

        <div class="form-group">
          <label class="text-dark" for="credits">Credits :</label>
          <input type="text" class="form-control" name="credits" value="{{ $exam->credits }}"/>
        </div>

        <button type="submit" class="btn btn-primary">Update exam Structure</button>
      </form>
  </div>
</div>
@endsection
