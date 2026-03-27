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
@if($student->invoice)
<div class="text-dark px-3 pb-5">
  <h3 align="center">Download your Invoice from here</h3>
  <div>
    <embed src="{{asset('storage')}}/{{$student->invoice}}" width="100%" height="2100px"/>
  </div>
</div>
@else
<h3 class="bold text-dark" align="center">Your Invoice havn't generated.</h3>
@endif
@endsection
