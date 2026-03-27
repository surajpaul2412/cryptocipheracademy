@extends('layouts.backend.app')

@section('content')

@if(session()->get('success'))
  <div class="alert alert-success">
    {{ session()->get('success') }}  
  </div><br/>
@endif
@if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif
<style>
  th{
    font-size: 13px !important;
    font-weight: bold !important;
    color: #6bb51e;
  }
  td{
    font-size: 13px !important;
  }
  button{
    border: none;
    background: transparent;
  }
</style>
@if($gallery->count())
<div class="table-responsive px-3 pb-5">
 <table class="table table-striped">
    <thead>
        <tr>
          <th>S. no</th>
          <th>Short Image 1</th>
          <th>Short Image 2</th>
          <th>Large Image1</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
    </thead>
    <tbody>
      @foreach($gallery as $index => $gallery)
      <tr>
        <th>{{$index+1}}.</th>
        <td><img src="{{env('image_url')}}/gallery/{{$gallery->short_image1}}" width="80px"></td>
        <td><img src="{{env('image_url')}}/gallery/{{$gallery->short_image2}}" width="80px"></td>
        <td><img src="{{env('image_url')}}/gallery/{{$gallery->short_image3}}" width="80px"></td>
        <td><img src="{{env('image_url')}}/gallery/{{$gallery->short_image4}}" width="80px"></td>
        <td>
          <a href="{{ route('admin.gallery.edit',$gallery->id)}}">
            <i class="material-icons">edit</i>
          </a>
        </td>
        <td>
          <form action="{{ route('admin.gallery.destroy', $gallery->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button class="" type="submit"><i class="material-icons">delete</i></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@else
<h3 class="bold text-dark" align="center">Add some gallery images</h3>
@endif

<div align="right" style="position: fixed;bottom: 30px;right: 30px;">
  <a href="{{ route('admin.gallery.create')}}">
    <button class="btn px-5 pt-3" style="background: #1d1b27;color:#fff;">Add gallery images 
      <img class="pl-3" src="{{ asset('assets/backend/images/right-arrow.png') }}">
    </button>
  </a>
</div>
@endsection