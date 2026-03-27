@extends('layouts.backend.app')

@section('content')
<style type="text/css">
	h3,h4,h5,h6,p,div{
		color: #000;
	}
	.form-control{
		border-bottom: 1px solid #888 !important;
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
<div class="container-xl">
    <div class="row">
      <div class="col-lg-4">
        <div class="card card-profile py-4">
          <div class="card-body text-center">
            <img class="card-profile-img" src="{{env('image_url')}}/students/{{$info->image}}" width="40%">
            <h3 class="mb-3">{{ Auth::user()->name }}</h3>
            <p class="mb-4">
              <a href="mailto:{{$student->email}}"> {{ Auth::user()->email }}</a>
            </p>
            <button class="btn btn-outline-success btn-sm">
            	Phone : <a href="callto:{{$student->phone}}"> {{$student->phone}}</a>
            </button>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
      	<form class="card" method="post" action="{{ route('student.profile.update', $student->id) }}">
	      	@method('PATCH')
	        @csrf
	        <div class="card-body px-5">
	            <h3 class="card-title text-success">Edit Profile</h3>
	            <div class="row">
	              <div class="col-md-6">
	                <div class="form-group mb-3">
			          <label class="form-label">Student Name :</label>
			          <div >
			            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter Name" value="{{ $student->name }}" required>
			                @error('name')
			                    <span class="invalid-feedback" role="alert">
			                        <strong>{{ $message }}</strong>
			                    </span>
			                @enderror
			          </div>
			        </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group mb-3">
			          <label class="form-label">Email address :</label>
			          <div>
			            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter Email" value="{{ $student->email }}">
			                @error('email')
			                    <span class="invalid-feedback" role="alert">
			                        <strong>{{ $message }}</strong>
			                    </span>
			                @enderror
			          </div>
			        </div>
	              </div>
	              <div class="col-md-12">
	                <div class="form-group mb-3">
			          <label class="form-label">Phone number :</label>
			          <div >
			            <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Enter Mobile Number" value="{{ $student->phone }}">
		                @error('phone')
		                    <span class="invalid-feedback" role="alert">
		                        <strong>{{ $message }}</strong>
		                    </span>
		                @enderror
			          </div>
			        </div>
	              </div>
	              
	              <div class="col-md-12">
	                <div class="form-group mb-3">
			          <label class="form-label">Your Password :</label>
			          <div>
			            <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
			            @error('password')
			                <span class="invalid-feedback" role="alert">
			                    <strong>{{ $message }}</strong>
			                </span>
			            @enderror
			            <small class="form-hint">
			              Your password must be 8-20 characters long, contain letters and numbers, and must not contain
			              spaces, special characters, or emoji.
			            </small>
			          </div>
			        </div>
	              </div>
	            </div>
	        </div>
	        <div class="card-footer text-right">
	            <button type="submit" class="btn btn-primary">Update Profile</button>
	        </div>
        </form>
      </div>
    </div>
</div>
@endsection