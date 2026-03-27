@extends('layouts.frontend.app')
@section('metas')
<title>Music & Sound Engineering Institute - Contact Us | Crypto Cipher® ( Academy,India)</title>
<meta name="description" content="Call , WhatsApp & email support available during official hours from 10 A.M - 5 P.M. Studio address and route guidance for Crypto Cipher Academy Location.">
@endsection

@section('css')
@endsection


@section('content')
<div class="bg-theme1 main-inner">
    <section class="container slider-header">
        <!-- title -->
        <div class="px-3 pt-4 media-pt-0">
            <h1 class="font-regular text-grey2 pl-2 pb-0 font-13 inner-title uppercase">contact US</h1>
            <h4 class="font-black text-black font-35 marT-10">Get In Touch With Us</h4>
        </div>
        <!-- content -->
        <div class="row px-3 pt-2 mb-32">
            <div class="col-md-6 mb-5">
                <div class="slider-header bg-theme">
                    <div class="p-x-4 py-4">
                        <h5 class="font-regular text-dark font-22">Admission Support</h5>
                        <h6 class="font-regular text-dark font-14 pt-3">Book your studio tour & free counselling session</h6>
                        <h6 class="font-medium text-dark font-16">Time- 10 AM - 5 PM ( Sunday Closed )</h6>
                        <form class="text-center" method="POST" action="{{route('contact-us.store')}}">
                            @csrf
                            <!-- name -->
                            <div class="md-form mt-5 w-100">
                                <input type="text" class="form-control {{ ($errors->has('name')) ? 'is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                                <label>Name</label>
                                <span class="invalid-feedback" role="alert">
                                  @if ($errors->has('name'))
                                      {{ $errors->first('name') }}
                                  @else
                                      Name is required
                                  @endif
                                </span>
                            </div>
                            <!-- phone number -->
                            <div class="md-form mt-0 w-100">
                                <input type="number" class="form-control {{ ($errors->has('phone')) ? 'is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>
                                <label>Phone number</label>
                                <span class="invalid-feedback" role="alert">
                                  @if ($errors->has('phone'))
                                      {{ $errors->first('phone') }}
                                  @else
                                      Name is required
                                  @endif
                                </span>
                            </div>
                            <!-- E-mail -->
                            <div class="md-form mt-0 w-100">
                                <input type="email" class="form-control {{ ($errors->has('email')) ? 'is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                <label>Email ID</label>
                                <span class="invalid-feedback" role="alert">
                                  @if ($errors->has('email'))
                                      {{ $errors->first('email') }}
                                  @else
                                      Name is required
                                  @endif
                                </span>
                            </div>
                            <!-- message -->
                            <div class="md-form mt-0 w-100">
                                <textarea class="form-control md-textarea {{ ($errors->has('message')) ? 'is-invalid' : '' }}" name="message" rows="5"></textarea>
                                <label>Tell something about yourself !</label>
                                <span class="invalid-feedback" role="alert">
                                  @if ($errors->has('message'))
                                      {{ $errors->first('message') }}
                                  @else
                                      Name is required
                                  @endif
                                </span>
                            </div>
                            <div class="mx-3 mb-2 mt-3">
                                <button type="submit" class="page-6-btn font-bold w-100">
                                    Thanks! Send it to us
                                </button>
                            </div>
                            @if(isset($success))
                                <div class="col-md-12 col-12">
                                    <div class="text-success bold font-14 pt-3">
                                        {{ $success }}
                                    </div>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="slider-header bg-theme mb-4">
                    <div class="row">
                        <!-- address -->
                        <div class="col-md-12 col-12">
                            <div class="row py-3">
                                <div class="col-md-1 col-12">
                                    <img src="{{ asset('assets/frontend/img/building.svg') }}" alt="building" width="38px" class="px-2">
                                </div>
                                <div class="col-md-11 col-12 media-contact-px-2">
                                    <h5 class="font-bold text-grey2 font-14">ADDRESS</h5>
                                    <div class="font-regular text-grey2 font-13">
                                        Crypto Cipher Audio Lab, Space No-1, Second Floor,  DA - Block Market, (Ramji Lal Commercial Shopping Complex) Shalimar Bagh, New Delhi - 110088, Landmark : Near Haider Pur Dispensary.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider-header bg-theme mb-4">
                    <div class="row">
                        <!-- address -->
                        <div class="col-md-12 col-12">
                            <div class="row py-3">
                                <div class="col-md-1 col-12">
                                    <img src="{{ asset('assets/frontend/img/scooter.svg') }}" alt="scooter" width="42px" class="px-2">
                                </div>
                                <div class="col-md-11 col-12 media-contact-px-2">
                                    <h5 class="font-bold text-grey2 font-14">PERSONAL VEHICLE FOLLOW GOOGLE MAP</h5>
                                    <h5 class="font-bold text-grey2 font-14" style="line-height: 0.4;">GOOGLE LOCATION</h5> 
                                    <div class="font-regular text-grey2 font-13">
                                        <a href="https://goo.gl/maps/Z6Wd1afrtgv" class="text-grey2" target="_blank">https://goo.gl/maps/Z6Wd1afrtgv</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider-header bg-theme mb-3">
                    <div class="row">
                        <!-- address -->
                        <div class="col-md-12 col-12">
                            <div class="row py-3">
                                <div class="col-md-1 col-12">
                                    <img src="{{ asset('assets/frontend/img/subway.svg') }}" alt="subway" width="36px" class="px-2">
                                </div>
                                <div class="col-md-11 col-12 media-contact-px-2">
                                    <h5 class="font-bold text-grey2 font-14">METRO ROUTE</h5>
                                    <div class="font-regular text-grey2 font-13 pr-3">
                                        Haider Pur Metro > Take E-Rikhshaw > DA Block Market > Look for Ramji Lal Complex > Come to Second Floor
                                    </div>

                                    <div class="font-regular text-grey2 font-13 mt-3 pr-3">
                                        Jahangir Puri Metro (Gate no.1) > Take E-Rikhshaw ( Haider Pur Dispensary ) > Look for Ramji Lal complex > Come to second floor.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="font-regular text-grey2 font-13 pl-1">
                    We value and eagerly await your response to the products and services that you have received from us. Please provide us with your feedback below
                    <div class="row pt-3">
                        <div class="col-md-1 pl-2 col-1">
                            <img src="{{ asset('assets/frontend/img/telephone-green.svg') }}" alt="telephone-green" width="36px" class="px-2">
                        </div>
                        <div class="col-md-11 col-11">
                            <h5 class="font-bold text-dark font-18">
                                <a href="callto:9910092983" class="text-dark"> Call US 9910092983</a>
                            </h5>
                        </div>
                    </div>
                    <div class="row pt-0 mt-0">
                        <div class="col-md-1 pl-2 col-1">
                            <img src="{{ asset('assets/frontend/img/mail.svg') }}" alt="mail" width="40px" class="px-2">
                        </div>
                        <div class="col-md-11 col-11">
                            <h5 class="font-bold text-dark font-18">
                                <a href="mailto:academy@cryptocipher.in" class="text-dark">academy@cryptocipher.in</a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  Crypto Cipher Audio Lab - Location | map-->
    <section class="container slider-header mt-4 px-3">
        <!-- title -->
        <div class="px-2 pt-4 pl-0">
            <h4 class="font-black text-black font-18">Crypto Cipher Audio Lab - Location</h4>
        </div>
        <!-- map -->
        <div class="row">
            <div class="col-md-12" style="margin-bottom: -10px;">
                <iframe class="px-2 pt-2 pb-4" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13995.598565125096!2d77.1533306!3d28.7225451!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x39fe4dacd8acbe54!2sCrypto%20Cipher%20Academy%20%7C%20Music%20Production%20Courses%20%26%20Sound%20Engineering!5e0!3m2!1sen!2sin!4v1597531445913!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </section>
</div>
@endsection


@section('script')
@endsection