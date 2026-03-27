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
@if($studioEquipmentHardware->count())
<div class="table-responsive px-3 pb-5">
 <table class="table table-striped">
    <thead>
        <tr>
          <th>S. no</th>
          <th>Label</th>
          <th>Menu 1</th>
          <th>Menu 2</th>
          <th>Menu 3</th>
          <th>Menu 4</th>
          <th>Menu 5</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
    </thead>
    <tbody>
      @foreach($studioEquipmentHardware as $index => $row)
      <tr>
        <th>{{$index+1}}.</th>
        <td class="bold">{{ $row->label }}</td>
        <td>{{ $row->option1 }}</td>
        <td>{{ $row->option2 }}</td>
        <td>{{ $row->option3 }}</td>
        <td>{{ $row->option4 }}</td>
        <td>{{ $row->option5 }}</td>
        <td>
          <a href="{{ route('admin.studioEquipmentHardware.edit',$row->id)}}">
            <i class="material-icons">edit</i>
          </a>
        </td>
        <td>
          <form action="{{ route('admin.studioEquipmentHardware.destroy', $row->id)}}" method="post">
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
<h3 class="bold text-dark" align="center">Add some menus</h3>
@endif

<div align="right" style="position: fixed;bottom: 30px;right: 30px;">
  <a href="{{ route('admin.studioEquipmentHardware.create')}}">
    <button class="btn px-5 pt-3" style="background: #1d1b27;color:#fff;">Add menu 
      <img class="pl-3" src="{{ asset('assets/backend/images/right-arrow.png') }}">
    </button>
  </a>
</div>
@endsection