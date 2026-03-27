@extends('layouts.backend.app')

@section('content')
<style>
  .cross{
    position: absolute;
    right: 3px;
    top: -10px;
    background: transparent;
    border: none;
  }
  .edit{
    position: absolute;
    right: 15px;
    bottom: 0px;
  }
</style>
@if(session()->get('success'))
  <div class="alert alert-success">
    {{ session()->get('success') }}  
  </div><br/>
@endif
@if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif
@if($users->count())
<div class="row clearfix pt-5">
    @foreach($users as $user)
      <div class="col-lg-3 mb-4 col-md-3 col-sm-6 col-xs-12">
        <form action="{{ route('admin.faculty.destroy', $user->id)}}" method="post">
          @csrf
          @method('DELETE')
          <button class="cross" type="submit"><img src="{{ asset('assets/backend/images/cancel.png') }}"  width="25px"></button>
        </form>
        <div class="pb-3 pt-4 px-4 bg-white" style="border-radius: 5px;border: solid 0.5px #d3d2d8;">
            <img src="{{ asset('assets/backend/images/faculty.svg') }}" width="35px">
            <h6 class="bold text-dark">Name: {{$user->name}}</h6>
            <h6 class="bold text-dark">Email: {{$user->email}}</h6>
        </div>
        <a href="{{ route('admin.faculty.edit',$user->id)}}" class="edit"><img src="{{ asset('assets/backend/images/writing.png') }}"></a>
      </div>
    @endforeach
</div>
@else
  <h3 class="px-3 pt-3 pb-2 text-dark" align="center">No facultys exist please add some.</h3>
@endif


<div align="right" style="position: absolute;bottom: 30px;right: 30px;">
  <a href="{{ route('admin.faculty.create')}}">
    <button class="btn px-5 pt-3" style="background: #1d1b27;color:#fff;">Add new faculty 
      <img class="pl-3" src="{{ asset('assets/backend/images/right-arrow.png') }}">
    </button>
  </a>
</div>
@endsection