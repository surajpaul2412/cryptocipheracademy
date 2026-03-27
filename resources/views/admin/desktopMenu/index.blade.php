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
@if($desktopMenu->count())
<div class="table-responsive px-3 pb-5">
 <table class="table table-striped">
    <thead>
        <tr>
          <th>S. no</th>
          <th>Section</th>
          <th>Main Menu</th>
        </tr>
    </thead>
    <tbody>
      @foreach($desktopMenu as $index => $menu)
      <tr>
        <th>{{$index+1}}.</th>
        <th>Section{{$index+1}}</th>
        <td class="bold">
          @foreach($menu->desktopMainMenu as $mainmenu)
            {{$mainmenu->name}}, 
          @endforeach
        </td>
        <td>
          <a href="{{ route('admin.desktopMenu.edit',$menu->id)}}">
            <i class="material-icons">edit</i>
          </a>
        </td>
        <td>
          <form action="{{ route('admin.desktopMenu.destroy', $menu->id)}}" method="post">
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
<h3 class="bold text-dark" align="center">Enter Main Menu</h3>
@endif
@endsection