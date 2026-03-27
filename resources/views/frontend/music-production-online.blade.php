@extends('layouts.frontend.app')
@section('title')
<title>Crypto Cipher® ( Academy,India)</title>
@endsection

@section('css')
<style>
    .ul-logic {
        list-style: none;
        padding-left: 0px;
    }
    .ul-logic li {
        background:url('{{ asset('assets/frontend/img/book.svg') }}') no-repeat 0px 15px;
        background-size: 20px;
        padding-left: 34px;
        padding-top: 8px;
        padding-bottom: 3px;
    }
    .quick-info{
        list-style: none;
    }
    .quick-info li {
        background:url('{{ asset('assets/frontend/img/Ellipse.png') }}') no-repeat 0px 10px;
        background-size: 8px;
        padding-left: 18px;
        padding-bottom: 3px;
    }
    b, strong {
        font-weight: 800 !important;
    }
</style>
@endsection

@section('content')
<style>
    b, strong {
        font-weight: 800 !important;
    }
</style>
<div class="bg-theme1 main-inner">
    <section class="container slider-header">
        <!-- title -->
        <div class="px-3 pt-4 media-pt-0">
            <h1 class="font-regular text-grey2 pl-2 pb-0 font-13 inner-title uppercase">Music Production Module</h1>
            <h4 class="font-black text-black font-35 marT-10">Music Production (Online Course)</h4>
        </div>
        <!-- content -->
        <div class="row px-3 media-px-2">
            <div class="col-md-6 my-2">
                <div class="media-px-2" align="left">
                    @if($musicProductionOnline->count())
                    @foreach($musicProductionOnline as $row)
                        {!! $row->content !!}
                    @endforeach
                    <div class="mobile-center">
                        <a href="{{url('/register')}}">
                            <div class="font-regular mb-2 mt-4 page-12-btn">
                                APPLY NOW
                            </div>
                        </a>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-md-6 my-2 pt-3">
                <div class="slider-header bg-theme p-4" align="left">
                    <h4 class="font-black text-black font-18">Who Can Enroll Music Production (Online Course)?</h4>
                    <ul class="font-regular text-black font-13 pl-0 pr-3 pt-2 quick-info">
                        @if($musicProductionOnlineSound->count())
                        @foreach($musicProductionOnlineSound as $row)
                            <li>{!! $row->content !!}</li>
                        @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--  Logic Pro X & Ableton Live  -->
    <section class="container slider-header mt-4 px-3" id="logicAbleton">
        <!-- content -->
        <div class="row">
            <div class="col-md-12 mx-2 pt-4">
                @if($musicProductionOnlineOverview->count())
                <h4 class="font-black text-black font-18">Overview Of the module</h4>
                <ul class="font-regular text-grey2 font-13 ul-logic">
                    @foreach($musicProductionOnlineOverview as $row)
                    <li>
                        {!! $row->content !!}
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
    </section>
    <!-- studio recording -->
    @if($musicProductionOnlineModule->count())
    @foreach($musicProductionOnlineModule as $row)
    <section class="container slider-header mt-4" id="recordings">
        <!-- content -->
        <div class="row mx-2 media-mx-0">
            <div class="col-md-7 col-12 py-4">
                <div class="pb-3">
                    <h6 class="font-black bold font-20"><span><img alt="{{$row->heading}}" class="pr-3 media-studio-img" src="{{env('image_url')}}/module/{{$row->icon}}" width="7%"></span>{{$row->heading}}</h6>
                    <div class="font-regular pb-3 font-13 text-grey2">
                        {!! $row->content !!}
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-12 py-4" align="right">
                <img src="{{env('image_url')}}/module/{{$row->image}}" alt="{{$row->heading}}" class="media-w-100" width="90%">
            </div>
        </div>
    </section>
    @endforeach
    @endif
</div>
@endsection

@section('script')
@endsection
