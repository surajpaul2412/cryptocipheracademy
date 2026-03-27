@extends('layouts.frontend.app')
@section('metas')
<title>{{$work->meta_title}} | Crypto Cipher® ( Academy,India)</title>
<meta name="description" content="{!!$work->meta_description!!}">
@endsection

@section('css')
<style type="text/css">
    .my-5{
        margin-top: 4rem!important;
        margin-bottom: 3rem!important;
    }
    .about-see-more img{
        padding-bottom: 1.4px;
        width: 24px;
        margin-top: -3px;
    }
    .about-see-more span{
        font-size: 13px;
    }
    .font-1vw{
        font-size: 1vw;
    }
    @media only screen and (max-width: 945px) {
        .marT-10{
            margin-top: 5px !important;
        }
    }
</style>
@endsection

@section('content')
<div class="bg-theme1 main-inner">
    <section class="container slider-header">
        <!-- title -->
        <div class="px-3 pt-4 media-pt-0 pb-3">
            <div class="row">
                <div class="col-md-8 col-8" align="left">
                    <h2 class="font-regular text-grey2 pl-2 pb-0 font-13 inner-title">Crypto Cipher Student Work</h2>
                </div>
                <div class="col-md-4 col-4" align="right" style="margin-top: -5px;">
                    <button class="page-4-btn font-regular pt-1" onclick="document.location.href='{{url('student_work')}}';">
                        <i class="fas fa-angle-left pr-1"></i> Back
                    </button>
                </div>
            </div>            
            <h4 class="font-black text-black font-35 marT-10 pt-2">{!! \Illuminate\Support\Str::limit($work->name, 80, $end='...') !!}</h4>
        </div>
        <!-- content -->
        @if($work)
        <div class="row px-3">
            <div class="col-md-12 col-12">
    			<div class="row px-3">
                    <div class="col-md-3 pb-3">
                        <img alt="{{$work->name}}" src="{{env('image_url')}}/work/{{$work->image}}" class="d-block m-auto shadow-round" width="94%">
                    </div>
                    <div class="col-md-9 px-0">
                        <h1 class="font-regular bold font-13 text-dark">{{$work->name}}</h1>
                        <h2 class="font-regular text-dark font-11">{{$work->speciality}}</h2>
                        <div class="font-regular font-12 text-dark text-justify">
                            {!! $work->short_desc !!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active">
                                <div class="row py-3">
                                    <div class="col-md-12 col-12">
                                        <h2 class="font-regular bold font-13 text-dark">Student Workings :</h2>
                                        <p class="font-regular font-12 text-dark text-justify">
                                            {!! $work->student_profile !!}
                                        </p>
                                        <p class="font-regular font-12 text-dark text-justify">
                                            {!! $work->testimonial !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        @endif
    </section>
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