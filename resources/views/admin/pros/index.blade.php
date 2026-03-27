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
@if($pros->count())
<div class="table-responsive px-3 pb-5">
 <table class="table table-striped">
    <thead>
        <tr>
          <th>S. no</th>
          <th>Sort By</th>
          <th>Name</th>
          <th>Brief</th>
          <th>Description</th>
          <th>Image</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
    </thead>
    <tbody>
      @foreach($pros as $index => $pro)
      <tr>
        <th>{{$index+1}}.</th>
        <th>{{$pro->sort_by}}</th>
        <td class="bold">{{$pro->name}}</td>
        <td class="bold">{{ \Illuminate\Support\Str::limit($pro->brief, 50, $end='...') }}</td>
        <td>{{ \Illuminate\Support\Str::limit($pro->description, 80, $end='...') }}</td>
        <td><img src="{{env('image_url')}}/pros/{{$pro->image}}" width="80px"></td>
        <td>
          <a href="{{ route('admin.pros.edit',$pro->id)}}">
            <i class="material-icons">edit</i>
          </a>
        </td>
        <td>
          <form action="{{ route('admin.pros.destroy', $pro->id)}}" method="post">
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
<h3 class="bold text-dark" align="center">Enter some Pros</h3>
@endif

<div align="right" style="position: fixed;bottom: 30px;right: 30px;">
  <a href="{{ route('admin.pros.create')}}">
    <button class="btn px-5 pt-3" style="background: #1d1b27;color:#fff;">Add new pro 
      <img class="pl-3" src="{{ asset('assets/backend/images/right-arrow.png') }}">
    </button>
  </a>
</div>
@endsection