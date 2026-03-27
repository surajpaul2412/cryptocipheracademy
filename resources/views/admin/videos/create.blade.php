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
    <h3 class="heading">Add New videos</h3>
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
      <form method="post" action="{{ route('admin.videos.store') }}">
        @csrf
        <div class="form-group">
          <label class="text-dark" for="module_id">Module :</label>
            <select class="form-control" name="module_id" required>
              @foreach($modules as $module)
                <option value="{{$module->id}}">{{$module->name}}</option>
              @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="text-dark" for="title">Title :</label>
            <input type="text" class="form-control" name="title" required/>
        </div>
        <div class="form-group">
            <label class="text-dark" for="description">Description :</label>
            <input type="text" class="form-control" name="description" required/>
        </div>
        <div class="form-group">
            <label class="text-dark" for="video_url">video_url :</label>
            <input type="text" class="form-control" name="video_url" required/>
        </div>
        <button type="submit" class="btn btn-primary">Add Video</button>
      </form>
  </div>
</div>
@endsection