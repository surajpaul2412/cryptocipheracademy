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
    <h3 class="heading">Add New Exam Structure</h3>
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
      <form method="post" action="{{ route('admin.exam.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              <label class="text-dark" for="module">Module :</label>
              <input type="text" class="form-control" name="module"/>
          </div>

          <div class="form-group">
              <label class="text-dark" for="structure">Structure :</label>
              <input type="text" class="form-control" name="structure"/>
          </div>

          <div class="form-group">
              <label class="text-dark" for="marks">Marks :</label>
              <input type="text" class="form-control" name="marks"/>
          </div>

          <div class="form-group">
              <label class="text-dark" for="credits">Credits :</label>
              <input type="text" class="form-control" name="credits"/>
          </div>

          <button type="submit" class="btn btn-primary">Add Exam Structure</button>
      </form>
  </div>
</div>

@endsection