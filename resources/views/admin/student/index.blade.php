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
  .br-5{border-radius: 5px;}
  .b-5{border: solid 0.5px #d3d2d8;}
  .nav-items{
    margin:20px 15px; 
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
    <div class="col-12 bg-white mb-4 br-5">
      <ul class="list-unstyled bold text-dark pl-3 nav">
        <li class="nav-items"><i class=" fa fa-circle text-success mr-2"></i>Paid</li>
        <li class="nav-items"><i class=" fa fa-circle text-info mr-2"></i>Installment Running</li>
        <li class="nav-items"><i class=" fa fa-circle text-danger mr-2"></i>Pending Payment</li>
      </ul>
    </div>
    @foreach($users as $user)
      <div class="col-lg-3 mb-4 col-md-3 col-sm-6 col-xs-12">
        <form action="{{ route('admin.student.destroy', $user->id)}}" method="post">
          @csrf
          @method('DELETE')
          <button class="cross" type="submit"><img src="{{ asset('assets/backend/images/cancel.png') }}"  width="25px"></button>
        </form>
        @if($user->studentDetails)
        <div class="pb-3 pt-4 px-4 br-5 b-5 @if($user->studentDetails->fees_status == 1)bg-success @elseif($user->studentDetails->fees_status == 2) bg-info @else bg-danger text-white @endif}}">
            <img src="{{ asset('assets/backend/images/user.svg') }}" width="35px">
            <h6 class="bold">Name: {{$user->name}}</h6>
            <h5 class="bold">Email: {{$user->email}}</h5>
            <a href="{{ route('admin.student.show',$user->id)}}" class="badge badge-info text-dark">Student Details</a>
        </div>
        @else
        <div class="pb-3 pt-4 px-4 br-5 b-5 bg-dark">
            <img src="{{ asset('assets/backend/images/user.svg') }}" width="35px">
            <h6 class="bold">Name: {{$user->name}}</h6>
            <h5 class="bold">Email: {{$user->email}}</h5>
            <a class="badge badge-danger text-light">Details Not Available</a>
        </div>
        @endif
        <a href="{{ route('admin.student.edit',$user->id)}}" class="edit"><img src="{{ asset('assets/backend/images/writing.png') }}"></a>
      </div>
    @endforeach
</div>
@else
  <h3 class="px-3 pt-3 pb-2 text-dark" align="center">No students exist please add some.</h3>
@endif


<div align="right" style="position: absolute;bottom: 30px;right: 30px;">
  <a href="{{ route('admin.student.create')}}">
    <button class="btn px-5 pt-3" style="background: #1d1b27;color:#fff;">Add new student 
      <img class="pl-3" src="{{ asset('assets/backend/images/right-arrow.png') }}">
    </button>
  </a>
</div>
@endsection