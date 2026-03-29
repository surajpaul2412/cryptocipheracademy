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
    vertical-align: middle !important;
  }
  button{
    border: none;
    background: transparent;
  }
  .thumb{
    width: 70px;
    border-radius: 8px;
  }
</style>

@if($fastForwardCourses->count())
<div class="table-responsive px-3 pb-5">
 <table class="table table-striped">
    <thead>
        <tr>
          <th>S. no</th>
          <th>Image</th>
          <th>Heading</th>
          <th>Badge</th>
          <th>Sort</th>
          <th>Status</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
    </thead>
    <tbody>
      @foreach($fastForwardCourses as $index => $row)
      <tr>
        <th>{{ $index + 1 }}.</th>
        <td>
          <img class="thumb" src="{{ URL('/') }}/images/fastForwardCourse/{{ $row->image }}" alt="{{ $row->heading }}">
        </td>
        <td class="bold">
          {{ $row->heading }}
          @if($row->subheading)
            <div class="text-muted">{{ $row->subheading }}</div>
          @endif
        </td>
        <td>{{ $row->badge_text }}</td>
        <td>{{ $row->sort_order }}</td>
        <td>
          <span class="badge {{ $row->is_active ? 'badge-success' : 'badge-secondary' }}">
            {{ $row->is_active ? 'Active' : 'Inactive' }}
          </span>
        </td>
        <td>
          <a href="{{ route('admin.fastForwardCourse.edit', $row->id) }}">
            <i class="material-icons">edit</i>
          </a>
        </td>
        <td>
          <form action="{{ route('admin.fastForwardCourse.destroy', $row->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit"><i class="material-icons">delete</i></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@else
<h3 class="bold text-dark" align="center">Add your first Fast Forward course</h3>
@endif

<div align="right" style="position: fixed;bottom: 30px;right: 30px;">
  <a href="{{ route('admin.fastForwardCourse.create') }}">
    <button class="btn px-5 pt-3" style="background: #1d1b27;color:#fff;">Add Fast Forward Course
      <img class="pl-3" src="{{ asset('assets/backend/images/right-arrow.png') }}">
    </button>
  </a>
</div>
@endsection
