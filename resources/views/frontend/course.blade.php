@extends('layouts.frontend.app')
@section('metas')
<title>Sound Eng. and Music production Course difference | Crypto Cipher® ( Academy,India)</title>
<meta name="description" content="Crypto Cipher Foundation Music production course in Delhi & Diploma Sound Engineering Course Fees, Syllabus, Faculty, Duration & Admission Procedure.">
@endsection

@section('css')
@endsection


@section('content')
<div class="bg-theme1 main-inner">
    <section class="container slider-header">
        <!-- title -->
        <div class="px-3 pt-4 media-pt-0">
            <h1 class="font-regular text-grey2 pl-2 pb-0 font-13 inner-title uppercase">Music Production & Sound Engineering courses</h1>
            <h4 class="font-black text-black font-35 marT-10">Crypto Cipher Academy Courses</h4>
        </div>
        <!-- tabs and pills -->
         <div class="row px-3 pb-1">
            <div class="col-md-12 mt-3 d-flex">
            <a class="pr-2" href="">
                <div class="font-regular mb-2 mt-2 page-12-btn">
                    Main Courses
                </div>
            </a>
            <a class="pr-2" href="">
                <div class="font-regular mb-2 mt-2 page-12-btn">
                    Fast Forward Courses
                </div>
            </a>
            </div>
         </div>
        <!-- content -->
        <div class="row px-3 pb-1">
            @if($academyCourse->count())
            @foreach($academyCourse as $row)
            <div class="col-md-12 my-3">
                <div class="slider-header pt-4 pb-3 px-3">
                    <div class="row">
                        <div class="col-md-1 col-3">
                            <img src="{{env('image_url')}}/academyCourse/{{$row->image}}" alt="{{$row->heading}}" width="100%">
                        </div>
                        <div class="col-md-11 col-9 px-0 font-regular bold font-18 media-pt-0" style="padding-top: 1%;">
                            {{$row->heading}}
                        </div>
                    </div>
                    {!! $row->content !!}
                    <a href="{{$row->url}}">
                        <div class="font-regular mb-2 mt-2 page-12-btn">
                            EXPLORE MORE
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </section>
</div>
@endsection


@section('script')
@endsection