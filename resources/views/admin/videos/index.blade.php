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
@if($videos->count())
<div class="table-responsive px-3 pb-5">
 <table class="table table-striped">
    <thead>
        <tr>
          <th>S. no</th>
          <th>Module</th>
          <th>Title</th>
          <th>Description</th>
          <th>Video Url</th>
          <th>Watch</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
    </thead>
    <tbody>
      @foreach($videos as $index => $row)
      <tr>
        <th>{{$index+1}}.</th>
        <td class="bold">{{$row->module->name}}</td>
        <td>{{$row->title}}</td>
        <td>{{ \Illuminate\Support\Str::limit($row->description, 50, $end='...') }}</td>
        <td>{{ \Illuminate\Support\Str::limit($row->video_url, 50, $end='...') }}</td>
        <td>
          <a href="{{ route('admin.videos.show',$row->id)}}" target="_blank">
            <i class="material-icons">play_circle_outline</i>
          </a>
        </td>
        <td>
          <a href="{{ route('admin.videos.edit',$row->id)}}">
            <i class="material-icons">edit</i>
          </a>
        </td>
        <td>
          <form action="{{ route('admin.videos.destroy', $row->id)}}" method="post">
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
<h3 class="bold text-dark" align="center">Enter some academy Course</h3>
@endif

<div align="right" style="position: fixed;bottom: 30px;right: 30px;">
  <a href="{{ route('admin.videos.create')}}">
    <button class="btn px-5 pt-3" style="background: #1d1b27;color:#fff;">Add new Video
      <img class="pl-3" src="{{ asset('assets/backend/images/right-arrow.png') }}">
    </button>
  </a>
</div>
@endsection