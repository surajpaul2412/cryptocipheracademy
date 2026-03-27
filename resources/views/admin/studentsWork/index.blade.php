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
@if($studentsWork->count())
<div class="table-responsive px-3 pb-5">
 <table class="table table-striped">
    <thead>
        <tr>
          <th>S. no</th>
          <th>Year</th>
          <th>Name</th>
          <th>Speciality</th>
          <th>Short Description</th>
          <th>Status</th>
          <th>Image</th>
          <th>Order By</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
    </thead>
    <tbody>
      @foreach($studentsWork as $index => $row)
      <tr>
        <th>{{$index+1}}.</th>
        <th>{{$row->year}}</th>
        <td class="bold">{{$row->name}}</td>
        <td>{{$row->speciality}}</td>
        <td>{!! substr($row->short_desc, 0, 40) !!}...</td>
        @if(isset($row->status))
          <td>
            <form method="post" action="{{ route('admin.studentsWork.disable', $row->id) }}">
                @csrf
                @method('POST')
                <input type="hidden" class="form-control" name="status" value=""/>
                <button class="badge badge-success" type="submit">Enabled <i class="fa fa-toggle-on"></i></button>
            </form>
          </td>
        @else
          <td>
            <form method="post" action="{{ route('admin.studentsWork.enable', $row->id) }}">
                @csrf
                @method('POST')
                <input type="hidden" class="form-control" name="status" value="1"/>
                <button class="badge badge-danger" type="submit">Disabled <i class="fa fa-toggle-off"></i></button>
            </form>
          </td>
        @endif        
        <td><img src="{{env('image_url')}}/work/{{$row->image}}" width="80px"></td>        
        <td>{{$row->sort_by}}</td>        
        <td>
          <a href="{{ route('admin.studentsWork.edit',$row->id)}}">
            <i class="material-icons">edit</i>
          </a>
        </td>
        <td>
          <form action="{{ route('admin.studentsWork.destroy', $row->id)}}" method="post">
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
{{$studentsWork->links()}}
@else
<h3 class="bold text-dark" align="center">Add some Students Work</h3>
@endif

<div align="right" style="position: fixed;bottom: 30px;right: 30px;">
  <a href="{{ route('admin.studentsWork.create')}}">
    <button class="btn px-5 pt-3" style="background: #1d1b27;color:#fff;">Add new Work 
      <img class="pl-3" src="{{ asset('assets/backend/images/right-arrow.png') }}">
    </button>
  </a>
</div>
@endsection