@extends('layouts.frontend.app')
@section('metas')
<title>Audio Faculty Department | Music Production Course | Crypto Cipher® ( Academy,India)</title>
<meta name="description" content="Crypto Cipher experienced Music Production Faculty & Sound Engineering Faculty in Delhi, India.">
@endsection

@section('css')
<style type="text/css">
    .faculty-btn{
        font-family: 'Roboto-Bold';
        border-radius: 16px;
        font-weight: 400;
        color: #7dc34f;
        padding: 5px 18px;
        font-size: 11px;
        box-shadow: 1px 1px 3px 0px rgba(50,50,50,0.10), -1.8px -1.8px 3px 0px rgba(255,255,255,0.8);
        background-image: linear-gradient(to right, #eeeff4, #f4f5f9);
        border: 1px solid rgba(255,255,255,0.3);
    }
    .faculty-btn:hover{
        background-image: linear-gradient(to bottom right, #f1f2f7, #f2f3f7);
        box-shadow: inset 1px 1px 4px -1px rgba(0,0,0,0.1),
                inset -4px -3px 6px -1px rgba(255,255,255,0.7),
                -0.1px -0.1px 0 rgba(255,255,255,1),
                0.1px 0.1px 0 rgba(0,0,0,0.15),
                0px 12px 10px -14px rgba(0,0,0,0.05);
    }
</style>
@endsection

@section('content')
<div class="bg-theme1 main-inner">
    <section class="container slider-header">
        <!-- title -->
        <div class="px-3 pt-4 media-pt-0">
            <h1 class="font-regular text-grey2 pl-2 pb-0 font-13 inner-title uppercase">AUDIO FACULTY DEPARTMENTS</h1>
            <h4 class="font-black text-black font-35 marT-10">Meet Faculty, Management & Artist Team</h4>
        </div>
        <!-- content -->
        <div class="row px-3">
            @if($team->count())
            @foreach($teamProduction as $row)
            <div class="col-md-4 mt-4 mb-3">
                <div class="slider-header bg-theme" align="center">
                    <img class="d-block mx-auto py-3 pt-4" src="{{env('image_url')}}/team/{{$row->image}}" alt="{{$row->heading}}" width="24%">
                    <div class="about-title px-4 pt-2 bold font-16">{{$row->heading}}</div>
                    <div class="about-desc px-3 pt-3 pb-4">{!!$row->content!!}</div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </section>
    <!-- team members section -->
    <section class="container slider-header mt-4">
        <!-- title -->
        <div class="px-2 pt-4 pb-4">
            <h6 class="font-regular text-black pl-2 pb-0 font-16 bold">Team Member</h6>
        </div>
        <!-- content -->
        <div class="row px-3">
            @if($team->count())
            @foreach($team as $index => $row)
            <div class="col-md-4 mb-3" style="margin-top: 80px;">
                <div class="slider-header bg-theme" align="center">
                    <img src="{{env('image_url')}}/team/{{$row->image}}" width="55%" alt="{{$row->name}}" class="mx-auto d-block p-1 bg-theme shadow-round" style="border-radius: 50%;margin-top: -26%">
                    <h6 class="about-name bold pt-4">{{$row->name}}</h6>
                    <div class="about-title pb-2 font-400">{!!$row->designation!!}</div>
                    <div class="about-desc pt-2 px-1 font-400">{!! \Illuminate\Support\Str::limit($row->content, 310, $end='...') !!}</div>
                    <div class="my-4 px-3">
                        <a data-toggle="modal" data-target="#myModal{{$index+1}}">
                            <span class="font-regular faculty-btn">See More</span>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </section>
</div>

<!-- modal -->
@foreach($team as $index => $row)
<div class="modal fade" id="myModal{{$index+1}}" role="dialog" style="z-index: 999999;">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h4 align="center" class="about-name bold">{{$row->name}}</h4>
                <h6 class="font-regular font-14 text-dark text-justify" style="transform: initial;">
                    {!!$row->content!!}
                </h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection

@section('script')
@endsection
