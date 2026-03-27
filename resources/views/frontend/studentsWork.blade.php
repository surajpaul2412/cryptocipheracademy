@extends('layouts.frontend.app')
@section('metas')
<title>Crypto Cipher Student Work | Course Reviews & Profiles | Crypto Cipher® ( Academy,India)</title>
<meta name="description" content="Sound Engineering & Music Production Course pass out student profiles and course reviews.">
@endsection

@section('css')
<style>
    .nav{
        display: block !important;
    }
    .nav li{
        margin: 10px 0px;
    }
    .main-nav2 li{
        margin: 0px 0px !important;
    }
    .main-nav2 li a{
        color: #5B5E65;
    }
    .nav-pills1 .nav-link1.active, .nav-pills1 .show>.nav-link1{
        color: #02BC4D !important;
    }
    .nav-pills .nav-item{
        box-shadow: 1px 1px 4px 0px rgba(25,25,25,0.15), -1.5px -1.5px 2px 0px rgba(255,255,255,0.8) !important;
        background-image: linear-gradient(to right, #edeef3 , #f4f5f9);
        border: 1px solid rgba(255,255,255,0.3);
        border-radius: 0;
        border-radius: 0;
    }
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link{
        background-color: inherit;
        color: inherit;
        border-right: 5px solid #02BC4D;
        border-radius: 0;
    }
</style>
@endsection

@section('content')
<div class="bg-theme1 main-inner">
    <section class="container slider-header">
        <!-- title -->
         <div >
             <div class="px-3 pt-4 media-pt-0" >
            <h1 class="font-regular text-grey2 pl-2 pb-0 font-13 inner-title uppercase" >STUDENT WORK</h1>
            <h4 class="font-black text-black font-35 marT-10">Student Profile</h4>
        </div>
         </div>
       
        <!-- content -->
        <div class="row px-4 pb-2">

            <div class="col-md-4 pl-2 mobile-pr-2" >
                <div class="" style="position: sticky !important; top: 10% !important;">
                    <!-- try -->
                    @if($studentsWork->count())
                    <ul id="myTabs" class="nav nav-pills" role="tablist" data-tabs="tabs">
                        @foreach($studentsWork as $index => $row)
                        <li class="nav-item mobile-mb-3">
                            <a class="nav-link {{$index == 0 ? 'active' : '' }}" href="#tab{{$index+1}}" data-toggle="tab">
                                <div class="row">
                                    <div class="col-md-4 col-5 student">
                                        <img alt="{{$row->name}}" src="{{env('image_url')}}/work/{{$row->image}}" class="d-block m-auto shadow-round" width="100%">
                                    </div>
                                    <div class="col-md-8 col-7 px-0">
                                        <h6 class="font-11 text-dark font-regular">{{$row->year}}</h6>
                                        <h5 class="bold font-12 text-dark font-regular">{{$row->name}}</h5>
                                        <h5 class="font-11 text-dark font-regular">{{$row->speciality}}</h5>
                                        <h6 class="desktop-d-none">
                                            <button class="page-4-btn font-regular" data-toggle="modal" data-target="#myModal{{$index+1}}">
                                                Read More <i class="fas fa-angle-right pl-1"></i>
                                            </button>
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    <div align="center" class="d-flex mt-3 justify-content-center">
                        {{$studentsWork->links()}}
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-md-8 mobile-d-none">
                @if($studentsWork->count())
                <div class="">
                    <div class="tab-content">
                        @foreach($studentsWork as $key => $row)
                        <div role="tabpanel" class="tab-pane {{$key == 0 ? 'active' : '' }}" id="tab{{$key+1}}">
                            <div class="row px-3">
                                <div class="col-md-3 pb-3">
                                    <img alt="{{$row->name}}" src="{{env('image_url')}}/work/{{$row->image}}" class="d-block m-auto shadow-round" width="94%">
                                </div>
                                <div class="col-md-9 px-0">
                                    <h2 class="font-regular bold font-13 text-dark">{{$row->name}}</h2>
                                    <h2 class="font-regular text-dark font-11">{{$row->speciality}}</h2>
                                    <div class="font-regular font-12 text-dark text-justify">
                                        {!! $row->short_desc !!}
                                        <div class="mb-3">
                                            <a class="page-4-btn px-2 py-1 font-regular pt-1" href="{{route('student_work.show', $row->slug)}}">
                                                 View More <!-- <i class="fas fa-angle-right pl-2"></i> -->
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <ul id="myTabs" class="row navbar navbar-expand-lg shadow-none nav nav-pills1 p-0 main-nav2" role="tablist" data-tabs="tabs" style="list-style: none;text-align: center;display: flex !important;box-shadow: 1px 1px 4px 0px rgba(25,25,25,0.15), -1px -1px 2px 1px rgba(255,255,255,0.8) !important;border: 1px solid rgba(255,255,255,0.3) !important;">
                                        <li class="nav-item border-right-line col-md-6 col-6 py-2">
                                            <a class="nav-link1 active" href="#generalProfile{{$key+1}}" data-toggle="tab">General Profile</a>
                                        </li>
                                        <li class="nav-item border-right-line col-md-6 col-6 py-2">
                                            <a class="nav-link1" href="#testimonial{{$key+1}}" data-toggle="tab">Testimonial</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="generalProfile{{$key+1}}">
                                            <div class="row py-3">
                                                <div class="col-md-12 col-12">
                                                    <h2 class="font-regular bold font-13 text-dark">Student Profile</h2>
                                                    <p class="font-regular font-12 text-dark text-justify">
                                                        {!! $row->student_profile !!}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="testimonial{{$key+1}}">
                                            <div class="row py-3">
                                                <div class="col-md-12 col-12">
                                                    <p class="font-regular font-12 text-dark text-justify">
                                                        {!! $row->testimonial !!}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
</div>

<!-- modal details in mobile -->
<div class="desktop-d-none">
    @if($studentsWork->count())
    @foreach($studentsWork as $key => $row)
    <div class="modal" id="myModal{{$key+1}}" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <img alt="{{$row->name}}" src="{{env('image_url')}}/work/{{$row->image}}" class="d-block m-auto shadow-round" width="60%">
                    <h2 class="font-regular bold font-13 text-dark">{{$row->name}}</h2>
                    <h2 class="font-regular text-dark font-11">{{$row->speciality}}</h2>
                    <p class="font-regular font-12 text-dark text-justify">
                        {!! $row->short_desc !!}
                    </p>
                    <div class="col-md-12">
                        <ul id="myTabs" class="row navbar navbar-expand-lg shadow-none nav nav-pills1 p-0 main-nav2" role="tablist" data-tabs="tabs" style="list-style: none;text-align: center;display: flex !important;box-shadow: 1px 1px 4px 0px rgba(25,25,25,0.15), -1px -1px 2px 1px rgba(255,255,255,0.8) !important;border: 1px solid rgba(255,255,255,0.3) !important;">
                            <li class="nav-item border-right-line col-md-6 col-6 py-2">
                                <a class="nav-link1 active" href="#generalProfileModal{{$key+1}}" data-toggle="tab">General Profile</a>
                            </li>
                            <li class="nav-item border-right-line col-md-6 col-6 py-2">
                                <a class="nav-link1" href="#testimonialModal{{$key+1}}" data-toggle="tab">Testimonial</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="generalProfileModal{{$key+1}}">
                                <div class="row py-3">
                                    <div class="col-md-12 col-12">
                                        <h2 class="font-regular bold font-13 text-dark">Student Profile</h2>
                                        <p class="font-regular font-12 text-dark text-justify">
                                            {!! $row->student_profile !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="testimonialModal{{$key+1}}">
                                <div class="row py-3">
                                    <div class="col-md-12 col-12">
                                        <p class="font-regular font-12 text-dark text-justify">
                                            {!! $row->testimonial !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif
</div>
@endsection

@section('script')
<!-- lazyloader -->
<script src="js/customLazy.js"></script>
<script src="https://rawgit.com/intoro/Lazy_Load_JQuery/master/js/2_2_4_jquery.min.js"></script>
<script src="https://rawgit.com/intoro/Lazy_Load_JQuery/master/js/1_9_7_jquery.lazyload.js"></script>
<script>
$(document).ready(function(){
  $('img.lazy').lazyload({
    effect: "fadeIn"
  });
});
</script>
@endsection