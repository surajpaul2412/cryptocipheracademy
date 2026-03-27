@extends('layouts.frontend.app')
@section('metas')
<title>Crypto Cipher Video Gallery | Youtube Videos | Crypto Cipher® ( Academy,India)</title>
<meta name="description" content="About Crypto Cipher renowned products, reviews, feedback & students success">
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
    .modal-body{
        padding: 2px;
    }
</style>
@endsection

@section('content')
<div class="bg-theme1 main-inner">
    <section class="container slider-header">
        <!-- title -->
        <div class="px-3 pt-4 media-pt-0 pb-4">
            <h1 class="font-regular text-grey2 pl-2 pb-0 font-13 inner-title">STUDENT AND COMPANY WORK</h1>
            <h4 class="font-black text-black font-35 marT-10">Video Gallery</h4>
        </div>
        <!-- content -->
        @if($gallery->count())
        <div class="row px-3">
            @foreach($gallery as $index => $row)
            <div class="col-md-12 my-3">
                <div class="slider-header bg-theme px-3">
                    <h4 class="font-bold font-18 text-black pt-3">{{$row->name}}</h4>
                    <div class="row">
                        @foreach($row->videoGalleryUrls as $key => $video)
                            <div class="col-md-4 col-12 py-3">
                                <a type="button" class="video-btn" data-toggle="modal" data-src="https://www.youtube.com/embed/{{$video->url}}" data-target="#myModal{{$video->id}}" style="width: 100%;">
                                    <img alt="{{$video->url}}" src="//img.youtube.com/vi/{{$video->url}}/0.jpg" width="100%">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        @endif
    </section>
</div>

    <!-- Modal -->
    @if($gallery->count())
    @foreach($gallery as $index => $row)
        @foreach($row->videoGalleryUrls as $key => $video)
            <div class="modal fade" id="myModal{{$video->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-body">
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src="" id="video{{$video->id}}"  allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        @endforeach
    @endforeach
    @endif

@endsection

@section('script')
    @if($gallery->count())
    @foreach($gallery as $index => $row)
    @foreach($row->videoGalleryUrls as $key => $video)
    <script>
        $(document).ready(function() {
            var $videoSrc;  
            $('.video-btn').click(function() {
                $videoSrc = $(this).data( "src" );
            });
                $('#myModal{{$video->id}}').on('shown.bs.modal', function (e) {
                $("#video{{$video->id}}").attr('src',$videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0" ); 
            });
                $('#myModal{{$video->id}}').on('hide.bs.modal', function (e) {
                $("#video{{$video->id}}").attr('src',$videoSrc); 
            });
        });
    </script>
    @endforeach
    @endforeach
    @endif
@endsection