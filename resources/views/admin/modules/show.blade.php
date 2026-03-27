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
@if($module->count())
<div class="table-responsive px-3 pb-5">
 <table class="table table-striped">
    <thead>
        <tr>
          <th>S. no</th>          
          <th>Title</th>
          <th>Description</th>
          <th>Video url</th>
          <th>Show</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
    </thead>
    <tbody>
      @foreach($module->videos as $index => $row)
      <tr>
        <th>{{$index+1}}.</th>
        <td>{!! substr($row->title, 0, 40) !!}...</td>
        <td>{!! substr($row->description, 0, 40) !!}...</td>
        <td>{{ substr($row->video_url, 0, 40) }}...</td>
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
<h3 class="bold text-dark" align="center">No student have accessing this module.</h3>
@endif
@endsection
