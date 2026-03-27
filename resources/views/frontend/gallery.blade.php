@extends('layouts.frontend.app')
@section('metas')
<title>Recording Studio Equipment list gallery | Crypto Cipher® ( Academy,India)</title>
<meta name="description" content="Music Studio Equipment List & Gallery at Crypto Cipher for Music Production Courses & Advanced Sound Engineering studio environment.">
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/css/lightbox.min.css">
<style>
    .hw-flex a div{
        font-family: 'Roboto-Bold';
        color: #5B5E65;
        font-size: 13px;
        text-transform: uppercase;
        cursor: pointer;
        box-shadow: 2px 2px 4px 0px rgba(50,50,50,0.10), -2px -2px 3px 0px rgba(255,255,255,0.8);
        background-image: linear-gradient(to right, #edeef3 , #f4f5f9);
        border: 1px solid rgba(255,255,255,0.3);
    }
    .hw-flex a div:hover{
        background-image: linear-gradient(to bottom right, #f1f2f7, #f2f3f7);
        box-shadow: inset 1px 1px 4px -1px rgba(0,0,0,0.1),
                inset -4px -3px 6px -1px rgba(255,255,255,0.7),
                -0.1px -0.1px 0 rgba(255,255,255,1),
                0.1px 0.1px 0 rgba(0,0,0,0.15),
                0px 12px 10px -14px rgba(0,0,0,0.05);
    }
    .hw-flex a{
        padding: 0px 3px;
    }
    .hw-flex a div{
        padding: 6px 0px;
    }
    a{
        outline: none;
    }
    .img-fluid{
        background-size:150%;background-position:center;min-height:200px;min-width:15vw;max-width:240px;max-height: 200px;background-repeat: no-repeat;
    }
    @media only screen and (max-width: 750px){
        .hw-flex a{
            padding: 0px 0px !important;
        }
        .img-fluid{
            background-size:150%;background-position:center;width:100%;min-width:100%;max-width:100%;background-repeat: no-repeat;
        }
    }
    .box-shadow{
        box-shadow: 2px 2px 4px 0px rgba(50,50,50,0.10), -2px -2px 3px 0px rgba(255,255,255,0.8);
        background-image: linear-gradient(to right, #edeef3 , #f4f5f9);
        border: 5px solid rgba(255,255,255,0.3);
    }
</style>
@endsection

@section('content')
<div class="bg-theme1 main-inner">
    <section class="container slider-header">
        <!-- title -->
        <div class="px-3 pt-4 media-pt-0">
            <h1 class="font-regular text-grey2 pl-2 pb-0 font-13 inner-title uppercase">Studio Equipments & Gallery</h1>
            <h4 class="font-black text-black font-35 marT-10">Crypto Cipher Studio Equipments</h4>
        </div>
        <!-- content -->
        <div class="row px-3">
            <!-- hardware App-->
            <div class="col-md-12 my-2">
                <h6 class="font-medium text-black bold font-20 pb-2"><span><img class="pr-3 mobile-hw-img" alt="Path215" src="{{ asset('assets/frontend/img/Path215.svg') }}" width="6%"></span>Hardware Equipments</h6>
                @if($studioEquipmentHardware->count())
                @foreach($studioEquipmentHardware as $row)
                <div class="mt-1 media-mt-0">
                    <div class="d-flex hw-flex">
                        @if($row->option1 != null)
                        <a align="center" class="flex-fill"><div>{{$row->option1}}</div></a>
                        @else
                        @endif
                        @if($row->option2 != null)
                        <a align="center" class="flex-fill"><div>{{$row->option2}}</div></a>
                        @else
                        @endif
                        @if($row->option3 != null)
                        <a align="center" class="flex-fill"><div>{{$row->option3}}</div></a>
                        @else
                        @endif
                        @if($row->option4 != null)
                        <a align="center" class="flex-fill"><div>{{$row->option4}}</div></a>
                        @else
                        @endif
                        @if($row->option5 != null)
                        <a align="center" class="flex-fill"><div>{{$row->option5}}</div></a>
                        @else
                        @endif
                    </div>
                </div>
                @endforeach
                @endif
                <div class="row mt-3 px-2 hardware">
                    @if($studioEquipmentHardwareImage->count())
                    @foreach($studioEquipmentHardwareImage as $row)
                    <div class="col-md-3 px-1">
                        <div class="box-shadow">
                            <img class="lazy" alt="equipments" data-original="{{env('image_url')}}/studioEquipment/{{$row->image}}" width="100%">
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
            <!-- software App -->
            <div class="col-md-12 my-3">
                <h6 class="font-medium text-black bold font-20 pb-2"><span><img class="pr-3 mobile-hw-img" alt="computerGrey" src="{{ asset('assets/frontend/img/computerGrey.svg') }}" width="6%"></span>Software Applications</h6>
                @if($studioEquipmentSoftware->count())
                @foreach($studioEquipmentSoftware as $row)
                <div class="mt-1 media-mt-0">
                    <div class="d-flex hw-flex">
                        @if($row->option1 != null)
                        <a align="center" class="flex-fill"><div>{{$row->option1}}</div></a>
                        @else
                        @endif
                        @if($row->option2 != null)
                        <a align="center" class="flex-fill"><div>{{$row->option2}}</div></a>
                        @else
                        @endif
                        @if($row->option3 != null)
                        <a align="center" class="flex-fill"><div>{{$row->option3}}</div></a>
                        @else
                        @endif
                        @if($row->option4 != null)
                        <a align="center" class="flex-fill"><div>{{$row->option4}}</div></a>
                        @else
                        @endif
                        @if($row->option5 != null)
                        <a align="center" class="flex-fill"><div>{{$row->option5}}</div></a>
                        @else
                        @endif
                    </div>
                </div>
                @endforeach
                @endif
                <div class="row mt-3 px-2 software">
                    @if($studioEquipmentSoftwareImage->count())
                    @foreach($studioEquipmentSoftwareImage as $row)
                    <div class="col-md-3 px-1">
                        <div class="box-shadow">
                            <img class="lazy" alt="equipments" data-original="{{env('image_url')}}/studioEquipment/{{$row->image}}" width="100%">
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
            <!-- Crypto Cipher Studio & Lab -->
            <div class="px-3 pb-2">
                <h4 class="mt-3 font-black text-black font-35">Crypto Cipher Studio & Lab</h4>
                @if($gallery->count())
                <div class="row">
                @foreach($gallery as $row)
                    <div class="col-md-3 mt-3 col-12">
                        <a href="{{env('image_url')}}/gallery/{{$row->short_image1}}" data-lightbox="gallery" class="lazy w-100 d-flex mx-auto">
                            <div class="img-fluid img-thumbnail" style="background-image: url('{{env('image_url')}}/gallery/{{$row->short_image1}}');"></div>
                        </a>
                    </div>
                    <div class="col-md-3 mt-3 col-12">
                        <a href="{{env('image_url')}}/gallery/{{$row->short_image2}}" data-lightbox="gallery" class="lazy w-100 d-flex mx-auto">
                            <div class="img-fluid img-thumbnail" style="background-image: url('{{env('image_url')}}/gallery/{{$row->short_image2}}');"></div>
                        </a>
                    </div>
                    <div class="col-md-3 mt-3 col-12">
                        <a href="{{env('image_url')}}/gallery/{{$row->short_image3}}" data-lightbox="gallery" class="lazy w-100 d-flex mx-auto">
                            <div class="img-fluid img-thumbnail" style="background-image: url('{{env('image_url')}}/gallery/{{$row->short_image3}}');"></div>
                        </a>
                    </div>
                    <div class="col-md-3 mt-3 col-12">
                        <a href="{{env('image_url')}}/gallery/{{$row->short_image4}}" data-lightbox="gallery" class="lazy w-100 d-flex mx-auto">
                            <div class="img-fluid img-thumbnail" style="background-image: url('{{env('image_url')}}/gallery/{{$row->short_image4}}');"></div>
                        </a>
                    </div>
                @endforeach
                </div>                
                @else
                @endif
            </div>
        </div>
    </section>
</div>
@endsection

@section('script')
<!-- lightbox -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/js/lightbox.min.js"></script>
<script>
lightbox.option({
    'albumLabel':   "picture %1 of %2",
    'fadeDuration': 300,
    'resizeDuration': 150,
    'wrapAround': true
});
</script>
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