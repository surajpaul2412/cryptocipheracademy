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

@if($engineeringCourseModule->count())
<div class="table-responsive px-3 pb-5">
 <table class="table table-striped">
    <thead>
        <tr>
          <th>S. No</th>
          <th>Icon</th>
          <th>Heading</th>
          <th>Content</th>
          <th>image</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
    </thead>
    <tbody>
      @foreach($engineeringCourseModule as $key => $row)
        <tr>
            <td>{{ $key+1 }}.</td>
            <td><img src="{{env('image_url')}}/module/{{$row->icon}}" width="50px"></td>
            <td class="bold">{{$row->heading}}</td>
            <td>{!! \Illuminate\Support\Str::limit($row->content, 50, $end='...') !!}</td>
            <td><img src="{{env('image_url')}}/module/{{$row->image}}" width="90px"></td>
            <td>
              <a href="{{ route('admin.engineeringCourseModule.edit',$row->id)}}">
                Edit
              </a>
            </td>
            <td>
              <form action="{{ route('admin.engineeringCourseModule.destroy', $row->id)}}" method="post">
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
  <h3 class="px-3 pt-3 pb-2 text-dark" align="center">No content exist please add some.</h3>
@endif

<div align="right" style="position: fixed;bottom: 30px;right: 30px;">
  <a href="{{ route('admin.engineeringCourseModule.create')}}">
    <button class="btn px-5 pt-3" style="background: #1d1b27;color:#fff;">Add New Module 
      <img class="pl-3" src="{{ asset('assets/backend/images/right-arrow.png') }}">
    </button>
  </a>
</div>
@endsection
