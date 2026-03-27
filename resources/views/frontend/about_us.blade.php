@extends('layouts.frontend.app')
@section('metas')
@foreach($aboutUs as $meta)
<title>{{$meta->meta_title}} | Crypto Cipher® ( Academy,India)</title>
<meta name="keywords" content="{{$meta->meta_keyword}}">
<meta name="description" content="{{$meta->meta_description}}">
@endforeach
@endsection

@section('css')
<style type="text/css">
    .faculty-btn{
        border-radius: 16px;
        font-weight: 400;
        color: #7dc34f;
        padding: 5px 18px;
        font-size: 11px;
        box-shadow: 1px 1px 3px 0px rgba(50,50,50,0.10), -1.8px -1.8px 3px 0px rgba(255,255,255,0.8);
        background-image: linear-gradient(to right, #eeeff4, #f4f5f9);
    }
    .page-12-btn{
        box-shadow: 2px 2px 4px 0px rgba(50,50,50,0.10), -1px -1px 3px 0px rgba(255,255,255,0.8);
        background-image: linear-gradient(to right, #edeef3 , #f4f5f9);
        border: 1px solid rgba(255,255,255,0.3);
        font-size: 11px;
        font-weight: 600;
        text-align: center;
        color: #5b5e65;
        padding: 7px 0px;
        width: 170px;
    }
    .page-12-btn:hover{
        transition: 6s;
        transition-delay: all 5s ease;
        -webkit-transition-delay: all 5s ease;
        box-shadow: inset 1px 1px 4px -1px rgba(0,0,0,0.1),
                    inset -4px -3px 6px -1px rgba(255,255,255,0.7),
                    -0.1px -0.1px 0 rgba(255,255,255,1),
                    0.1px 0.1px 0 rgba(0,0,0,0.15),
                    0px 12px 10px -14px rgba(0,0,0,0.05);
        background-image: linear-gradient(to bottom right, #f1f2f7, #f2f3f7);
    }
</style>
@endsection


@section('content')
<div class="bg-theme1 main-inner">
    <section class="container slider-header">
        <!-- title -->
        <div class="px-3 pt-4 media-pt-0">
            <h1 class="font-regular text-grey2 pl-2 pb-0 font-13 inner-title uppercase">MISSION & VISION STATEMENT</h1>
            <h4 class="font-black text-black font-35 marT-10">Crypto Cipher Audio Lab</h4>
        </div>
        <!-- content -->
        @if($aboutUs->count())
        <div class="row px-3">
            @foreach($aboutUs as $row)
            <div class="col-md-6 mb-3 mt-"1>
                <h5 class="font-medium text-black font-400 font-18">
                    {{$row->heading}}
                </h5>
                <div class="font-regular text-grey2 font-13">
                    {!! $row->content !!}
                </div>
                <div class="mobile-center">
                    <a href="{{url('crypto_celeb')}}">
                        <div class="font-regular mt-3 page-12-btn">
                            Few Words From The Pros
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-6 my-2">
                <img src="{{env('image_url')}}/aboutUs/{{$row->image}}" alt="our studio" width="100%">
            </div>
            @endforeach
        </div>
        @endif
    </section>
    <!-- indian sample library development -->
    @if($aboutUsLibrary->count())
    <section class="container slider-header mt-4">
        @foreach($aboutUsLibrary as $row)
        <div class="px-4 pt-4 pb-4">
            <h6 class="font-regular text-black pb-0 font-18 bold">{{$row->heading}}</h6>
            <div class="font-regular text-grey2 font-13">
                {!!$row->content!!}
            </div>
            <div class="mt-3">
                <img src="{{ asset('images/aboutUs/about.png') }}" alt="equipments" width="100%">
            </div>
            <div class="mobile-center">
                <a href="">
                    <div class="font-regular mt-3 page-12-btn">
                        Visit Online Store
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </section>
    @endif
    <!-- Advanced Audio Technology Education -->
    @if($aboutUsTechnology->count())
    <section class="container slider-header mt-4">
        <!-- title -->
        @foreach($aboutUsTechnology as $row)
        <div class="px-4 pt-4 pb-4" style="margin-bottom: -6px;">
            <h6 class="font-regular text-black pb-0 font-18 bold">{{$row->heading}}</h6>
            {!! $row->content !!}
        </div>
        @endforeach
    </section>
    @endif
    <!-- Global Promotion of Indian Artists -->
    @if($aboutUsPromotion->count())
    <section class="container slider-header mt-4">
        @foreach($aboutUsPromotion as $row)
        <div class="px-4 pt-4 pb-4">
            <h6 class="font-regular text-black pb-0 bold font-18">{{$row->heading}}</h6>
            <div class="font-regular text-grey2 font-13">
                {!!$row->content!!}
            </div>
            <div class="row carousel">
                @foreach($aboutUsPromotionImage as $new)
                <div class="col-md-2 page-12-col-md-2 pt-3">
                    <img src="{{env('image_url')}}/aboutUs/{{$new->image}}" width="100%">
                </div>
                @endforeach
            </div>
            <div class="mobile-center">
                <a href="">
                    <div class="font-regular mt-3 page-12-btn">
                        Performance
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </section>
    @endif
</div>
@endsection


@section('script')
<!-- slider -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js"></script>
<script>
$(document).ready(function(){
  $('.carousel').slick({
    speed: 500,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 2000,
    dots:false,
    arrows:false,
    centerMode: true,
    responsive: [{
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
      }
    }, {
      breakpoint: 800,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 2,
        dots: false,
        arrows:false,
        infinite: true,
      }
    },  {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        infinite: true,
        arrows:false,
        autoplay: false,
        autoplaySpeed: 2000,
      }
    }]
  });
});
</script>
@endsection