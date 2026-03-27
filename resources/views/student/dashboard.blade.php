@extends('layouts.backend.app')

@section('content')
<style>
    .decoration-none{
        text-decoration: none !important;
    }
</style>

<div class="row clearfix pt-5">
    <div class="col-lg-3 mb-4 col-md-3 col-sm-6 col-xs-12">
        <a href="{{route('student.profile.index')}}" class="decoration-none">
            <div class="pb-3 pt-4 px-4 bg-white" style="border-radius: 5px;border: solid 0.5px #d3d2d8;">
                <img src="{{ asset('assets/backend/images/user.svg') }}" width="35px">
                <h6 class="bold text-dark">Edit Profile</h6>
                <p class="text-dark" style="font-size: 11px;">
                    You can change your basic information details from here.
                </p>
            </div>
        </a>
    </div>
    <div class="col-lg-3 mb-4 col-md-3 col-sm-6 col-xs-12">
        <a href="" class="decoration-none">
            <div class="pb-3 pt-4 px-4 bg-white" style="border-radius: 5px;border: solid 0.5px #d3d2d8;">
                <img src="{{ asset('assets/backend/images/resume.svg') }}" width="35px">
                <h6 class="bold text-dark">View Exam Result</h6>
                <p class="text-dark" style="font-size: 11px;">
                    Hey ! Check out your exam results from here. All the Best !
                </p>
            </div>
        </a>
    </div>
</div>

@endsection