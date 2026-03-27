@extends('layouts.frontend.app')
@section('title')
<title>Crypto Cipher® ( Academy,India)</title>
<meta name="keywords" content="Logic ProX , Ableton Live, Synthesis, Mixing, Mastering, Arrangements and many tutorials helping Music Production & Sound engineering students">
<meta name="description" content="Logic ProX , Ableton Live, Synthesis, Mixing, Mastering, Arrangements and many tutorials helping Music Production & Sound engineering students">
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick-theme.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick.css">
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
        border-bottom: 5px solid #02BC4D;
        border-radius: 0;
    }
    .nav-link{
        padding: 0px;
    }
    .inner-side{
        box-shadow: 1px 1px 4px 0px rgba(25,25,25,0.15), -1.5px -1.5px 2px 0px rgba(255,255,255,0.8) !important;
        background-image: linear-gradient(to right, #edeef3 , #f4f5f9);
        border: 1px solid rgba(255,255,255,0.3);
    }
    .media-pt-1{
        padding-top: 0.45rem;
    }
    @media only screen and (max-width: 745px) {
        .media-center{
            text-align: center;
        }
        .search-btn{
            padding: 5% 2% !important;
        }
        .mx-width-65{
           max-width: 100% !important;
        }
    }
    .bg-green{
        background: #7EC051 !important;
        font-weight: 400;
        border-radius: 28px;
    }
    .search-btn{
        padding: 2% 2%;border:none;background: transparent;
    }
    .mx-width-65{
       max-width: 65%;
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
        <div class="px-3 pt-4 media-pt-0">
            <h1 class="font-regular text-grey2 pl-2 pb-0 font-13 inner-title uppercase">news & articles</h1>
            <h4 class="font-black text-black font-35 marT-10">Crypto Cipher Newsroom</h4>
        </div>

        <div class="row">
            <div class="col-md-12 col-12" align="center">
                <form method="POST" action="{{route('newsroom.search')}}" class="d-flex mx-auto mx-width-65">
                    @csrf
                    <input type="text" class="form-control py-4 mt-1" name="search" placeholder="Search By Keyword..">
                    <button type="submit" class="search-btn"><i class="fa fa-search fa-2x text-green"></i></button>
                </form>
            </div>

            <div class="col-12 px-4">
                <div class="flexcontainer">
                    <strong class="bold font-regular mt-2 mr-2">Popular Searches :</strong>
                    @foreach($newsTags as $tag)
                        <a class="bg-green px-2 text-white mr-2 mt-2" style="line-height:3;font-size:9px;" href="{{route('newsroom.searchBy',$tag->tag)}}">{{$tag->tag}}</a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row px-4 pb-4">
            @foreach($news as $index => $row)
            <div class="nav-item col-md-4 col-12 mobile-mb-3 mt-4">
                <div class="slider-header nav-link {{$index == 0 ? 'active' : '' }}" href="#tab{{$index+1}}" data-toggle="tab">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="" class="lazy" style="background: url('{{env('image_url')}}/news/{{$row->image}}');background-origin: center;background-size:cover;background-repeat: no-repeat;height: 250px;"></div>
                        </div>
                        <div class="col-md-12 bold title">
                            <div class="px-2 pt-2" style="height:58px;overflow-y: hidden;">
                                {{ \Illuminate\Support\Str::limit($row->title, 58, $end='...') }}
                            </div>                                
                        </div>
                        <div class="col-md-12 py-2 px-4">
                            <div class="row">
                                <div class="col-md-4 col-6 media-center" align="left">
                                    <h6 class="mt-2">
                                        <button class="page-4-btn font-regular" onclick="document.location.href='{{route('newsroom.show',$row->slug)}}';">
                                            View More
                                            <!-- <i class="fas fa-angle-right pl-1"></i> -->
                                        </button>
                                    </h6>
                                </div>
                                <div class="col-md-8 col-6 media-pt-1 media-center" align="right">
                                    <button class="desktop-d-none page-4-btn font-regular" data-toggle="modal" data-target="#myModal{{$index+1}}">
                                        Read More
                                        <!-- <i class="fas fa-angle-right pl-1"></i> -->
                                    </button>
                                    <span class="font-regular font-11 mobile-d-none text-dark">{{$row->created_at}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>

<!-- modal details in mobile -->
<div class="desktop-d-none">
    @if($news->count())
    @foreach($news as $index => $row)
    <div class="modal fade" id="myModal{{$index+1}}" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-1">
                    <img alt="{{$row->title}}" data-original="{{env('image_url')}}/news/{{$row->image}}" class="lazy d-block mx-auto" width="100%">
                    <div class="font-bold text-black pt-3 px-2" style="text-align: justify;">{{$row->title}}</div>
                    <p class="font-regular text-grey2 px-2 pt-2">{!! $row->content !!}</p>
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