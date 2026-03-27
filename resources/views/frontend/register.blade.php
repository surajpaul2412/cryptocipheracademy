@extends('layouts.frontend.app')
@section('metas')
<title>Admissions are open now | Crypto Cipher® ( Academy,India)</title>
<meta name="description" content="Sound Engineering & Music Production Course Admissions Crypto Cipher Admission form, fee details, batch commencement dates & registration.">
<meta property="og:title" content="Admissions are open now | Crypto Cipher" />
<meta property="og:image:url" content="{{asset('assets/backend/images/fav.png')}}" />
<meta property="og:description" content="Sound Engineering & Music Production Course Admissions Crypto Cipher Admission form, fee details, batch commencement dates & registration." />
@endsection

@section('css')
<style>
    .btn-reset{
        background: transparent;
        outline: none;
        border: none;
    }
    .button[type="submit"]{
        background: #02BC4D;
        color: #fff;
        font-family: 'Roboto-Regular';
        font-size: 12px;
        text-transform: capitalize;
        padding: 9px 40px;
        box-shadow: none;
        font-weight: bold;
    }
    .button[type="submit"]:hover{
        color: #fff;
        box-shadow: none;
    }
    .button[type="submit"]:disabled {
        background: #A0A3A9;
    }
    .button1{
        background: #02BC4D;
        color: #fff;
        font-family: 'Roboto-Regular';
        font-size: 12px;
        text-transform: capitalize;
        padding: 9px 40px;
        box-shadow: none;
        font-weight: bold;
        margin-top: -2px;
    }
    label{
        font-size: 13px !important;
        font-family: 'Roboto-Regular';
    }
    form input[type="radio"]:checked {
        background-color: yellow;
    }
    .avatar-upload {
      position: relative;
      max-width: 205px;
      margin: 0px auto;
    }
    .avatar-upload .avatar-edit {
      position: absolute;
      right: 12px;
      z-index: 1;
      top: 10px;
    }
    .avatar-upload .avatar-edit input {
      display: none;
    }
    .avatar-upload .avatar-edit input + label {
      display: inline-block;
      width: 34px;
      height: 34px;
      margin-bottom: 0;
      border-radius: 100%;
      background: #FFFFFF;
      border: 1px solid transparent;
      box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
      cursor: pointer;
      font-weight: normal;
      transition: all 0.2s ease-in-out;
    }
    .avatar-upload .avatar-edit input + label:hover {
      background: #f1f1f1;
      border-color: #d6d6d6;
    }
    .avatar-upload .avatar-edit input + label:after {
      color: #757575;
      position: absolute;
      top: 50%;
      left: 0;
      right: 0;
      text-align: center;
      margin: auto;
    }
    .fa-upload{
        position: absolute;
        left: 30%;
        top: 23%;
    }
    .avatar-upload .avatar-preview {
      width: 192px;
      height: 192px;
      position: relative;
      border: 6px solid #F8F8F8;
      box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    }
    .avatar-upload .avatar-preview > div {
      width: 100%;
      height: 100%;
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
    }
    .quick-info{
        list-style: none;
    }
    .quick-info li {
        background:url('{{ asset('assets/frontend/img/Ellipse.png') }}') no-repeat 0px 5px;
        background-size: 8px;
        padding-left: 18px;
        padding-bottom: 0px;
    }
    #myButton{
        margin-top: -3px;
    }
    .invalid-feedback{
        display: block;margin-top: -10px;
    }
</style>
@endsection

@section('content')
<div class="bg-theme1 main-inner">
    <section class="container slider-header">
        <!-- title -->
        <div class="px-3 pt-4 media-pt-0">
            <h1 class="font-regular text-grey2 pl-2 pb-0 font-13 inner-title uppercase">Course registration</h1>
            <h4 class="font-black text-black font-35 marT-10">Admission Procedure</h4>
        </div>
        <!-- content -->
        <div class="row px-3">
            <div class="col-md-12 my-2">
                <div class="" align="left">
                    @if(session()->get('success'))
                      <div class="alert alert-success">
                        {{ session()->get('success') }}  
                      </div><br/>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <div class="font-regular pb-3 font-13 text-grey2 px-3 media-px">
                        <span class="bold">Please note Registration of your seat is done in two steps:</span><br><br>
                        <span class="bold text-black">Step A :</span> Online Payment of Rs 11800, Call Academy Counsellor <a class="text-grey2 bold font-regular" href="tel:9910092983">9910092983</a> and ask for 24 hours valid online quick payment link.<br>
                        <span class="bold text-black">Step B :</span> Submit the form available on this below given page.<br><br>

                        <span class="bold text-black">01.</span> Upload your signatures & parents/guardian signatures after reading all terms & conditions mentioned under this page.<br>
                        <span class="bold text-black">02.</span> You'll receive the confirmation of your seat within 24 hours after filling the form below & Submitting Registration amount. Registration Fees is not extra payment, It is part of your fees.<br>
                        <span class="bold text-black">03.</span> Incase you need any support or have any queries then don’t hesitate and contact at <a class="text-grey2 bold font-regular" href="tel:9910092983">9910092983</a> or email us at <a class="text-grey2 bold font-regular" href="mailto:academy@cryptocipher.in">academy@cryptocipher.in</a>.

                        <!-- Please note our all admissions happens through this page only ( url ) via online payment gateway and filling the form and paying registration amount confirms your seat.<br>
                        <span class="bold">01.</span> Upload your signatures & parents/guardian signatures after reading all terms & conditions mentioned under this page.<br>
                        <span class="bold">02.</span> You'll receive the confirmation of your seat just after filling the form below.<br>
                        <span class="bold">03.</span> Incase you need any support or have any queries then don’t hesitate and contact at <a class="text-grey2 bold font-regular" href="callto:9910092983">9910092983</a> or email us at <a class="text-grey2 bold font-regular" href="mailto:academy@cryptocipher.in">academy@cryptocipher.in</a> -->
                    </div>
                    <div class="font-medium text-black font-12 px-3 media-px">
                        Fill The Form ( Select Your Batch & Fill all your personal details )
                    </div>
                    <form method="POST" action="{{route('register.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="slider-header bg-theme1 mx-3 mt-4 media-mx">
                            <div class="px-4 pt-4 pb-3 register-form">
                                @csrf
                                @method('POST')
                                <!-- Application Form -->
                                <h5 class="font-medium text-black font-14">Application Form</h5>
                                <div class="row">
                                    <div class="col-md-8">
                                        <span class="font-regular font-12 text-grey2">Registration Date</span>
                                        <h5 class="font-medium text-black font-14 pt-1">Crypto Cipher</h5>
                                        <div class="md-form mt-0 w-100">
                                            <input type="text" class="form-control" id="output" disabled/>
                                        </div>
                                        <span class="font-regular font-12 text-grey2">Select Course</span>
                                        <div class="mobile-d-grid">
                                            <span>
                                                <input type="radio" id="music1" name="course" value="Music Production Course" required>
                                                <label class="pl-2" for="music1">Music Production Course</label>
                                            </span>
                                            <span class="pl-3 media-pl-0">
                                                <input type="radio" id="music2" name="course" value="Music Production Diploma">
                                                <label class="pl-2" for="music2">Music Production Diploma</label>
                                            </span>
                                            <span class="pl-3 media-pl-0">
                                                <input type="radio" id="music3" name="course" value="Sound Engineering Diploma">
                                                <label class="pl-2" for="music3">Sound Engineering Diploma</label>
                                            </span>
                                            <span class="pl-0 media-pl-0">
                                                <input type="radio" id="music4" name="course" value="Live Sound Engineering">
                                                <label class="pl-2" for="music4">Live Sound Engineering</label>
                                            </span>
                                            @error('course')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <span class="font-regular font-12 text-grey2">Batch Commencement</span>
                                        <div class="mobile-d-grid">
                                            @php
                                                $homeNotification = $homeNotification->first();
                                            @endphp
                                            <span>
                                                <input type="radio" id="april" name="batch" value="{{$homeNotification->register_date1}}" required>
                                                <label class="pl-2" for="april">{{$homeNotification->register_date1}}</label>
                                            </span>
                                            <span class="pl-3 media-pl-0">
                                                <input type="radio" id="may" name="batch" value="{{$homeNotification->register_date2}}">
                                                <label class="pl-2" for="may">{{$homeNotification->register_date2}}</label>
                                            </span>
                                            <span class="pl-3 media-pl-0">
                                                <input type="radio" id="jun" name="batch" value="{{$homeNotification->register_date3}}">
                                                <label class="pl-2" for="jun">{{$homeNotification->register_date3}}</label>
                                            </span>
                                            @error('batch')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!-- upload image -->
                                        <div class="avatar-upload">
                                            <div class="avatar-edit">
                                                <input type='file' id="imageUpload" name="profile_image"/>
                                                <label for="imageUpload"><i class="fa fa-upload"></i></label>
                                            </div>
                                            <div class="avatar-preview">
                                                <div id="imagePreview" style="background-image: url('{{ asset('assets/frontend/img/profile.jpg') }}');">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Student Details -->
                                <h5 class="font-medium text-black font-14 pt-3">Student Details</h5>
                                <div class="md-form mt-0 w-100">
                                    <input type="text" class="form-control" name="name" required value="{{ old('name') }}">
                                    <label>Student Name</label>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- phone number -->
                                <div class="md-form mt-0 w-100">
                                    <input type="number" class="form-control" name="phone" required value="{{ old('phone') }}">
                                    <label>Phone Number</label>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- email -->
                                <div class="md-form mt-0 w-100">
                                    <input type="email" class="form-control" name="email" required value="{{ old('email') }}">
                                    <label>Email ID</label>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- Address -->
                                <div class="md-form mt-0 w-100">
                                    <input type="text" class="form-control" name="address" required value="{{ old('address') }}">
                                    <label>Address</label>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- Address -->
                                <div class="md-form mt-0 w-100 form-row">
                                    <div class="col-6 pr-3">
                                        <input type="text" name="nationality" class="form-control pr-3" required value="{{ old('nationality') }}">
                                        <label class="pr-3 pl-1">Nationality</label>
                                        @error('nationality')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-6 pl-3">
                                        <input type="text" name="pincode" class="form-control pl-3" value="{{ old('pincode') }}">
                                        <label class="pl-3">Pincode</label>
                                        @error('pincode')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- DOB -->
                                <div class="md-form mt-0 w-100">
                                    <input type="text" name="fathers_name" class="form-control" required value="{{ old('fathers_name') }}">
                                    <label>Father's/Guardian Name</label>
                                    @error('fathers_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- parents details -->
                                <div class="md-form mt-0 w-100">
                                    <input type="tel" name="fathers_phone" class="form-control" required value="{{ old('fathers_phone') }}">
                                    <label>Father's/Guardian Mobile Number</label>
                                    @error('fathers_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="md-form mt-0 w-100">
                                    <input type="text" name="guardian_name" class="form-control" value="{{ old('guardian_name') }}">
                                    <label>Mother's/Guardian Name</label>
                                    @error('guardian_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="md-form mt-0 w-100">
                                    <input type="tel" name="guardian_phone" class="form-control" value="{{ old('guardian_phone') }}">
                                    <label>Mother's/Guardian Mobile Number</label>
                                    @error('guardian_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="md-form mt-0 w-100">
                                    <input type="text" name="guardian_occupation" class="form-control" value="{{ old('guardian_occupation') }}">
                                    <label>Father's Occupation</label>
                                    @error('guardian_occupation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- GST info. -->
                                <h5 class="font-medium text-black font-14 pt-3">GST Information</h5>
                                <div>
                                    <span>
                                        <input type="radio" id="yes" name="gst" value="0">
                                        <label class="pl-2" for="yes">Applicable</label>
                                    </span>
                                    <span class="pl-3">
                                        <input type="radio" id="no" name="gst" value="1" required>
                                        <label class="pl-2" for="no">Not Applicable</label>
                                    </span>
                                    @error('gst')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="md-form mt-0 w-100">
                                    <input type="text" class="form-control" name="trade_title">
                                    <label>Trade/Business Title</label>
                                    @error('trade_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="md-form mt-0 w-100 form-row">
                                    <div class="col-12 col-md-6 pr-3">
                                        <input type="text" class="form-control pr-3" name="gst_number">
                                        <label class="pr-3 pl-1">GST Number</label>
                                        @error('gst_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6 pl-3 media-pl-0">
                                        <input type="text" class="form-control pl-3 media-pl-1" name="trade_address">
                                        <label class="pl-3 media-pl-1">Trade/Business Address</label>
                                        @error('trade_address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Academic Details -->
                                <h5 class="font-medium text-black font-14 pt-3">Academic Details:</h5>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="md-form mt-0 w-100 form-row">
                                            <label class="pl-3">SSC (10th)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 media-pt-4">
                                        <div class="md-form mt-0 w-100 form-row">
                                            <input type="text" class="form-control pl-3" name="10_school" value="{{ old('10_school') }}">
                                            <label class="pl-3">Name of School / College</label>
                                            @error('10_school')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="md-form mt-0 w-100 form-row px-2">
                                            <input type="text" class="form-control px-2" name="10_year" value="{{ old('10_year') }}">
                                            <label class="px-2">Year</label>
                                            @error('10_year')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form mt-0 w-100 form-row">
                                            <input type="text" class="form-control pl-3" name="10_board" value="{{ old('10_board') }}">
                                            <label class="pl-3">Board / University</label>
                                            @error('10_board')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="md-form mt-0 w-100 form-row">
                                            <label class="pl-3">HSC (12th)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 media-pt-4">
                                        <div class="md-form mt-0 w-100 form-row">
                                            <input type="text" class="form-control pl-3" name="12_school" value="{{ old('12_school') }}">
                                            <label class="pl-3">Name of School / College</label>
                                            @error('12_school')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="md-form mt-0 w-100 form-row px-2">
                                            <input type="text" class="form-control px-2" name="12_year" value="{{ old('12_year') }}">
                                            <label class="px-2">Year</label>
                                            @error('12_year')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form mt-0 w-100 form-row">
                                            <input type="text" class="form-control pl-3" name="12_board" value="{{ old('12_board') }}">
                                            <label class="pl-3">Board / University</label>
                                            @error('12_board')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="md-form mt-0 w-100 form-row">
                                            <label class="pl-3">Undergraduate</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 media-pt-4">
                                        <div class="md-form mt-0 w-100 form-row">
                                            <input type="text" class="form-control pl-3" name="ug_school" value="{{ old('ug_school') }}">
                                            <label class="pl-3">Name of School / College</label>
                                            @error('ug_school')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="md-form mt-0 w-100 form-row px-2">
                                            <input type="text" class="form-control px-2" name="ug_year" value="{{ old('ug_year') }}">
                                            <label class="px-2">Year</label>
                                            @error('ug_year')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form mt-0 w-100 form-row">
                                            <input type="text" class="form-control pl-3" name="ug_board" value="{{ old('ug_board') }}">
                                            <label class="pl-3">Board / University</label>
                                            @error('ug_board')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="md-form mt-0 w-100 form-row">
                                            <label class="pl-3">Graduate</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 media-pt-4">
                                        <div class="md-form mt-0 w-100 form-row">
                                            <input type="text" class="form-control pl-3" name="g_school" value="{{ old('g_school') }}">
                                            <label class="pl-3">Name of School / College</label>
                                            @error('g_school')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="md-form mt-0 w-100 form-row px-2">
                                            <input type="text" class="form-control px-2" name="g_year" value="{{ old('g_year') }}">
                                            <label class="px-2">Year</label>
                                            @error('g_year')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form mt-0 w-100 form-row">
                                            <input type="text" class="form-control pl-3" name="g_board" value="{{ old('g_board') }}">
                                            <label class="pl-3">Board / University</label>
                                            @error('g_board')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="md-form mt-0 w-100 form-row">
                                            <label class="pl-3">Post Graduate</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 media-pt-4">
                                        <div class="md-form mt-0 w-100 form-row">
                                            <input type="text" class="form-control pl-3" name="pg_school" value="{{ old('pg_school') }}">
                                            <label class="pl-3">Name of School / College</label>
                                            @error('pg_school')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="md-form mt-0 w-100 form-row px-2">
                                            <input type="text" class="form-control px-2" name="pg_year" value="{{ old('pg_year') }}">
                                            <label class="px-2">Year</label>
                                            @error('pg_year')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form mt-0 w-100 form-row">
                                            <input type="text" class="form-control pl-3" name="pg_board" value="{{ old('pg_board') }}">
                                            <label class="pl-3">Board / University</label>
                                            @error('pg_board')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Academic Details -->
                                <h5 class="font-medium text-black font-14 pt-3">Education Stream</h5>
                                <div class="mobile-d-grid">
                                    <span>
                                        <input type="radio" id="stream1" name="stream" value="Science" required>
                                        <label class="pl-2" for="stream1">Science</label>
                                    </span>
                                    <span class="pl-3 media-pl-0">
                                        <input type="radio" id="stream2" name="stream" value="Arts">
                                        <label class="pl-2" for="stream2">Arts</label>
                                    </span>
                                    <span class="pl-3 media-pl-0">
                                        <input type="radio" id="stream3" name="stream" value="Commerce">
                                        <label class="pl-2" for="stream3">Commerce</label>
                                    </span>
                                    <span class="pl-3 media-pl-0">
                                        <input type="radio" id="stream4" name="stream" value="Other">
                                        <label class="pl-2" for="stream4">Other</label>
                                    </span>
                                    @error('stream')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="md-form mt-0 w-100">
                                    <input type="text" class="form-control" name="music_bg_info" value="{{ old('music_bg_info') }}">
                                    <label class="bold">Music/Audio Background Information:</label>
                                    @error('music_bg_info')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="md-form mt-0 w-100">
                                    <input type="text" class="form-control media-pt-20px" name="plans" value="{{ old('plans') }}">
                                    <label class="bold">What are your future plans related to Audio Industry?</label>
                                    @error('plans')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="md-form mt-0 w-100">
                                    <input type="text" class="form-control" name="health_problem" value="{{ old('health_problem') }}">
                                    <label class="bold">Any Health Problem</label>
                                    @error('health_problem')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- verification -->
                                <h5 class="font-medium text-black font-14 pt-3">Identity Verification</h5>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="md-form mt-0 w-100 form-row">
                                                    <label class="pl-3">Identity Type.</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 media-pt-4">
                                                <div class="md-form mt-2 w-100 form-row">
                                                    <select class="form-control" name="id_type" required>
                                                        <option value="">-- Select id type --</option>
                                                        <option value="Passport">Passport</option>
                                                        <option value="Pan Card">Pan Card</option>                      
                                                        <option value="Aadhar Card">Aadhar Card</option>
                                                    </select>
                                                    @error('id_type')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- test -->
                                            <div class="col-md-6">
                                                <div class="md-form mt-0 w-100 form-row">
                                                    <label class="pl-3">Identity no.</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 media-pt-4">
                                                <div class="md-form mt-0 w-100 form-row">
                                                    <input type="text" class="form-control pl-3" name="id_no" required value="{{ old('id_no') }}">
                                                    <label class="pl-3">Identity Number</label>
                                                    @error('id_no')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label class="bold">Identity proof</label><br>
                                        <div id="student_verify" class="border">
                                            <student_verify class="pointer"></student_verify>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <button type="reset" class="font-bold font-13 text-grey2 mt-2 btn-reset">
                                        <div class="font-bold pt-1 mt-1">
                                            <img class="pr-2 pb-1" alt="reset" src="{{ asset('assets/frontend/img/reset.svg') }}"> Reset Form
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="font-regular pb-2 font-13 text-grey2 px-3">
                            <h5 class="font-medium text-black font-16 pt-5 pb-3">Terms and Conditions</h5>
                            The Terms & Conditions envisaged herein are integral to, and candidates applying for the admission in Crypto Cipher Academy are advised to go through the Terms and Conditions carefully, understand the same, and thereafter apply for the admission.
                            <div class="font-regular bold text-grey2 font-14 pt-2">Registration</div>
                            <ul class="font-regular text-grey2 font-13 pl-0 pt-2 quick-info">
                                <li>Candidates need to ensure that the information submitted by them is correct in all aspects.</li>
                                <li>Only one registration can be made in a particular batch by a candidate. Duplicate registrations are liable to be rejected and fee forfeited.</li>
                                <li>Candidates are required to upload their original photographs / Parents Signature as per the specification provided in this admission form. Failing to do so, they will be disallowed to take admission.</li>
                            </ul>
                            <div class="font-regular bold text-grey2 font-14">In Case of Cancellation of Registration</div>
                            <div class="pt-2">
                                The cancellation of registration hold back someone who is willing to take admission in the batch as there are limited number of seats and disturbs the overall arrangement.<br>It is advisable to make sure within you that you want study before registering yourself. However, in case of unavoidable circumstances, if a cancellation of registration is indispensable to be done, it will be carried out under three limitations:
                            </div>
                            <ul class="font-regular text-grey2 font-13 pl-0 pt-2 quick-info">
                                <li>If the candidate cancels his registration two weeks before the batch commencement date, he will get refund of 50 percent of registration amount excluding GST. B)</li>
                                <li>If the candidate inform and cancel his seat within the period of two weeks prior to batch commencement date, there will be no refund given back. C) </li>
                                <li>If the candidate don’t get in touch with the academy after registration and don’t show up in the first class, his/her seat will be cancelled with no refund. </li>
                            </ul>
                            <div class="font-regular bold text-grey2 font-14">Seat Cancellation Procedure</div>
                            <div class="pt-2">
                                Write an application signed by candidate and one of the parents stating clearly the reason for the cancellation of registration and submit to the office to initiate the process.
                            </div>
                            <div class="font-regular bold text-grey2 font-14 pt-2">How to Submit my Fee</div>
                            <ul class="font-regular text-grey2 font-13 pl-0 pt-2 quick-info">
                                <li>Students must pay their payable installment of fee within awarded time limit. Any delay in due payment (full or partial), beyond the contracted period, may payoff into the cancellation of seat with "no refund" at all.</li>
                                <li>No grace period will be offered for payment of installment.</li>
                                <li>Once commencement of batch is instituted, no fee will be refunded for any reason e.g. inability to attend classes due to health problems, change of mind, relocation to a new residence place or class schedule timings incompatibility etc.</li>
                            </ul>
                            <div class="font-regular bold text-grey2 font-14">Maintaining Classroom Discipline</div>
                            <ul class="font-regular text-grey2 font-13 pl-0 pt-2 quick-info">
                                <li>The classes will be scheduled in the morning and daytime according to modules. It is advisable to attend classes timely.</li>
                                <li>There will be no repetition of missed or absent classes/lectures due to logical complexity of course.</li>
                                <li>The language used by the teachers to teach will be a mix of Hindi and English. (Candidate must speak one out of two and be able to understand both.) </li>
                                <li>Any form of recording/capturing of lectures using any kind of A/V recording equipment is strictly prohibited as this is the intellectual property of the academy. Any failure in complying of this instruction in letter and spirit may results in confiscation of equipment and/or cancellation of registration.</li>
                                <li>Any act, willingly/unwillingly, within the academy premises, causing disturbance of academy environment, may lead to immediate cancellation of registration without any kind of refund. </li>
                            </ul>
                            <div class="font-regular bold text-grey2 font-14">Certification</div>
                            <div class="pt-2">
                                Certificates will only be issued after satisfying all the requirements related to exam modules and projects submission, within set deadlines, in maximum of 3 attempts.
                            </div>
                            <div class="font-regular bold text-grey2 font-14 pt-2">Health Advisory</div>
                            <div class="pt-2">
                                *Academy cares for the health of every student but will not be responsible for any ill-health situation/medical issue faced by candidate during the entire course duration, within or outside the premises. 
                            </div>

                            <h5 class="font-medium text-black font-16 pt-4">Undertaking</h5>
                            <div class="pt-2">
                                I/ We (The Student and/or Parents/Guardian) have completely read and understood the Terms and Conditions for admission as well as commencement of classes in the Crypto Cipher Academy. * <br>
                                I/ We also promise to abide by these rules and regulations. If found impeached, academy has right to take a disciplinary or legal action against us, and we will not challenge their decision in any court of law. * In case of any query/question/complaint or suggestion, you can access the management of academy by the following methods: 
                            </div>
                            <div class="pt-2">
                                <span class="bold">For Physical Access :</span> CRYPTO CIPHER Space No: 1, Second Floor DA - Block Market (Ramji Lal Commercial Shopping Complex) Shalimar Bagh, New Delhi – 110088. 
                            </div>
                            <div class="py-3">
                                <span>
                                    <a href="tel:9910092983" class="font-bold text-dark font-22"><img class="pb-1" alt="call" src="{{ asset('assets/frontend/img/call.svg') }}" width="22px"> Call US 9910092983</a>
                                </span>
                                <span class="pl-4">
                                    <a href="mailto:academy@cryptocipher.in" class="font-bold text-dark font-22"><img alt="mailGrey" src="{{ asset('assets/frontend/img/mailGrey.svg') }}" width="26px"> academy@cryptocipher.in</a>
                                </span>
                            </div>
                                
                            <div class="py-3">
                                <label class="bold font-regular font-13" for="myCheckbox">
                                    <input id="myCheckbox" type="checkbox" class="pl-2" />
                                    I Have Read and Understood all the Terms and Conditions and I Promise to Abide by all these Terms and Conditions and also those Implemented Further by Academy From Time to Time in Future. I also Certify that all the Information provided in this Admission form is Correct Best Extent to my Knowledge.
                                </label>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label class="bold">Parent's Signature</label><br>
                                    <div id="parent_sign" class="border">
                                        <parent_sign class="pointer"></parent_sign>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="bold">Student's Signature</label><br>
                                    <div id="student_sign" class="border">
                                        <student_sign class="pointer"></student_sign>
                                    </div>
                                </div>
                            </div>
                            <!-- <span class="font-bold font-14 text-black pr-3">Registration Fee : ₹ 11,800</span> -->
                            <button id="myButton" type="submit" class="btn btn-mt-2 button" disabled>Register</button>
                            <button type="submit" class="print btn button1">download form</button>                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('script')
<!-- currenmt date -->
<script type="text/javascript">
    var today = new Date();
    var day = today.getDate();
    var month = today.getMonth() + 1;
    var year = today.getFullYear();
    if (day < 10) {
      day = '0' + day
    }
    if (month < 10) {
      month = '0' + month
    }
    var out = document.getElementById("output");
    out.value = day + "/" + month + "/" + year;


    // preview image
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function() {
        readURL(this);
    });

    //check to pay
    $(document).ready(function () {
        $('#myCheckbox').click(function () {
        $('#myButton').prop("disabled", !$("#myCheckbox").prop("checked")); 
        })
    });
</script>


<!-- image preview via vuejs -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.3/vue.min.js"></script>
<script type="text/javascript">
Vue.component('parent_sign', {
  template: `
  <span @click="openUpload">
    <img ref="preview" :src="showImage" style="cursor:pointer;width:100%;" alt="upload">
    <input ref="input" @change="previewImage" type="file" id="file-field" name="signature1" style="display: none"/>
  </span>`,
  data: () => { return {
    showImage: "{{asset('assets/frontend/img/upload.png')}}"
  }},
  methods: {
    openUpload () {
      this.$refs.input.click()      
    },
    previewImage () {
      var reader = new FileReader()
      reader.readAsDataURL(this.$refs.input.files[0])
      reader.onload = e => {
        this.showImage = e.target.result
      } 
    }
  }
});

new Vue({
  el: '#parent_sign'
})

Vue.component('student_sign', {
  template: `
  <span @click="openUpload">
    <img ref="preview" :src="showImage" style="cursor:pointer;width:100%;" alt="upload">
    <input ref="input" @change="previewImage" type="file" id="file-field" name="signature2" style="display: none"/>
  </span>`,
  data: () => { return {
    showImage: "{{asset('assets/frontend/img/upload.png')}}"
  }},
  methods: {
    openUpload () {
      this.$refs.input.click()      
    },
    previewImage () {
      var reader = new FileReader()
      reader.readAsDataURL(this.$refs.input.files[0])
      reader.onload = e => {
        this.showImage = e.target.result
      } 
    }
  }
});
new Vue({
  el: '#student_sign'
})

// verification
Vue.component('student_verify', {
  template: `
  <span @click="openUpload">
    <img ref="preview" :src="showImage" style="cursor:pointer;width:100%;" alt="upload">
    <input ref="input" @change="previewImage" type="file" id="file-field" name="signature3" style="display: none"/>
  </span>`,
  data: () => { return {
    showImage: "{{asset('assets/frontend/img/upload1.png')}}"
  }},
  methods: {
    openUpload () {
      this.$refs.input.click()      
    },
    previewImage () {
      var reader = new FileReader()
      reader.readAsDataURL(this.$refs.input.files[0])
      reader.onload = e => {
        this.showImage = e.target.result
      } 
    }
  }
});
new Vue({
  el: '#student_verify'
})
</script>

<!-- download form -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.3.3/jQuery.print.min.js"></script>
<!-- <script src="https://allurewebsolutions.com/allure.js"></script> -->
<script>
$('.print').on('click', function() {
    $.print(".register-form");
});
</script>
@endsection