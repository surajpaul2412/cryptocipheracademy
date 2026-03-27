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
@if($contacts->count())
<div class="table-responsive px-3 pb-5">
 <table class="table table-striped">
    <thead>
        <tr>
          <th>S. no</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Message</th>
          <th>Date</th>
          <th>Delete</th>
        </tr>
    </thead>
    <tbody>
      @foreach($contacts as $index => $contact)
      <tr>
        <th>{{$index+1}}.</th>
        <td class="bold">{{$contact->name}}</td>
        <td><a href="mailto:{{$contact->email}}" class="font-weight-bold text-info">{{$contact->email}}</a></td>
        <td><a href="tel:{{$contact->phone}}" class="font-weight-bold text-info">{{$contact->phone}}</a></td>
        <!-- <td>{{ \Illuminate\Support\Str::limit($contact->message, 880, $end='...') }}</td> -->
        <td class="font-weight-normal">{{$contact->message}}</td>
        <td class="bold">{{$contact->created_at}}</td>
        <td>
          <form action="{{route('admin.contact.destroy',$contact->id)}}" method="post">
            @method('delete')
            @csrf
            <button class="badge badge-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@else
<h3 class="bold text-dark" align="center">No enquiries.</h3>
@endif
<div class="px-4" align="right">
  {{ $contacts->onEachSide(15)->links() }}
</div>
@endsection