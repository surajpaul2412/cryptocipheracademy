@extends('layouts.frontend.app')
@section('title')
<title>{{$news->meta_title}} | Crypto Cipher® ( Academy,India)</title>
<meta name="keywords" content="Logic ProX , Ableton Live, Synthesis, Mixing, Mastering, Arrangements and many tutorials helping Music Production & Sound engineering students">
<meta name="description" content="{{$news->meta_description}}">

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
    .bg-green{
        background: #7EC051 !important;
        font-weight: 400;
        border-radius: 28px;
    }
    .flexcontainer {
        min-height: 100%;
        max-height: 100%;
        display: flex;
        flex-direction: row;
        align-items: center;
        flex-wrap: wrap;
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
                    <h6 class="font-regular text-grey2 pl-2 pb-0 font-13 inner-title">Crypto Cipher Newsroom</h6>
                </div>
                <div class="col-md-4 col-4" align="right" style="margin-top: -5px;">
                    <button class="page-4-btn font-regular pt-1" onclick="document.location.href='{{url('newsroom')}}';">
                        <!-- <i class="fas fa-angle-left pr-1"></i> -->
                        Back
                    </button>
                </div>
            </div>            
            <h4 class="font-black text-black font-35 marT-10 pt-2">{!! \Illuminate\Support\Str::limit($news->title, 120, $end='...') !!}</h4>
            
            <div class="flexcontainer">
                <strong class="bold font-regular mt-2 mr-2">Tags :</strong>
                @foreach($news->newstags as $tag)
                    <a class="bg-green px-3 text-white mr-2 mt-2" style="line-height:3;font-size:9px;" href="{{route('newsroom.searchBy',$tag->tag)}}">{{$tag->tag}}</a>
                @endforeach
            </div>
        </div>
        <!-- content -->
        @if($news->count())
        <div class="row px-3">
            <div class="col-md-12 col-12">
                <img class="lazy" alt="{{$news->title}}" data-original="{{env('image_url')}}/news/{{$news->image}}" width="100%">
                <h4 class="font-bold text-black pt-3">{{$news->title}}</h4>
                <p class="font-regular text-grey2 pt-2">{!! $news->content !!}</p>
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