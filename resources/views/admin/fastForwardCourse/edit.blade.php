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
    color: #333;
    padding-top: 0;
    text-align: center;
  }
</style>
<div class="card uper">
  <div class="card-header">
    <h3 class="heading">Edit Fast Forward Course</h3>
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br/>
    @endif
    <form method="post" action="{{ route('admin.fastForwardCourse.update', $fastForwardCourse->id) }}" enctype="multipart/form-data">
      @method('PATCH')
      @csrf
      @include('admin.fastForwardCourse._form', ['buttonText' => 'Update Fast Forward Course'])
    </form>
  </div>
</div>
@endsection
