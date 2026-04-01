@extends('layouts.frontend.app')

@section('metas')
<title>Fast Forward {{ $fastForwardCourse->heading }} {{ $fastForwardCourse->subheading }} | Crypto Cipher Academy</title>
<meta name="description" content="{{ \Illuminate\Support\Str::limit(strip_tags($fastForwardCourse->description . ' ' . $fastForwardCourse->highlight_text), 160) }}">
@endsection

@section('css')
<style>
    .ul-logic {
        list-style: none;
        padding-left: 0px;
        margin-bottom: 0px;
    }
    .ul-logic li {
        background:url('{{ asset('assets/frontend/img/book.svg') }}') no-repeat 0px 15px;
        background-size: 20px;
        padding-left: 34px;
        padding-top: 8px;
        padding-bottom: 3px;
    }
</style>
@endsection

@section('content')
<div class="bg-theme1 main-inner">
    <section class="container slider-header">
        <div class="px-3 pt-4 media-pt-0">
            <h1 class="font-regular text-grey2 pl-2 pb-0 font-13 inner-title uppercase">Fast Forward Course</h1>
            <h4 class="font-black text-black font-35 marT-10">Fast Forward {{ $fastForwardCourse->heading }} {{ $fastForwardCourse->subheading }}</h4>
        </div>

        <div class="row px-3 pb-4">
            <div class="col-md-12 my-3">
                <div class="slider-header pt-4 pb-3 px-3">
                    <div class="row align-items-stretch">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="mb-3">
                                <div class="d-inline-block font-regular font-13 text-black uppercase mr-2 mb-2" style="padding: 7px 18px; border-radius: 999px; background: linear-gradient(to bottom, #ffffff 0%, #ececf1 100%); box-shadow: 0 4px 12px rgba(16, 24, 40, 0.14);">
                                    {{ $fastForwardCourse->badge_text }}
                                </div>
                                <div class="d-inline-block font-regular font-13 text-black uppercase mb-2" style="padding: 7px 18px; border-radius: 999px; background: linear-gradient(to bottom, #ffffff 0%, #ececf1 100%); box-shadow: 0 4px 12px rgba(16, 24, 40, 0.14);">
                                    {{ $fastForwardCourse->event_badge_text }}
                                </div>
                            </div>
                            <div class="font-regular text-grey2 font-13 mb-3 pr-md-4" style="line-height: 1.8;">
                                {!! nl2br(e($fastForwardCourse->description)) !!}
                                @if($fastForwardCourse->highlight_text)
                                    <span class="text-black bold">{{ $fastForwardCourse->highlight_text }}</span>
                                @endif
                            </div>
                            <div class="pt-2 pb-2" style="border-top: 1px solid #e4e4ea; border-bottom: 1px solid #e4e4ea;">
                                <div class="d-flex align-items-start mb-2">
                                    <span class="d-inline-flex align-items-center justify-content-center mr-2" style="width: 22px; min-width: 22px; height: 22px; border-radius: 50%; background-color: #f2f4f7; color: #7a828f; font-size: 10px;">
                                        <i class="far fa-clock"></i>
                                    </span>
                                    <div class="font-regular text-grey2 font-13" style="line-height: 1.7;">{{ $fastForwardCourse->time_text }}</div>
                                </div>
                                <div class="d-flex align-items-start mb-2">
                                    <span class="d-inline-flex align-items-center justify-content-center mr-2" style="width: 22px; min-width: 22px; height: 22px; border-radius: 50%; background-color: #f2f4f7; color: #7a828f; font-size: 10px;">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <div class="font-regular text-grey2 font-13" style="line-height: 1.7;">{{ $fastForwardCourse->seats_text }}</div>
                                </div>
                                <div class="d-flex align-items-start mb-2">
                                    <span class="d-inline-flex align-items-center justify-content-center mr-2" style="width: 22px; min-width: 22px; height: 22px; border-radius: 50%; background-color: #f2f4f7; color: #7a828f; font-size: 10px;">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <div class="font-regular text-grey2 font-13" style="line-height: 1.7;">{{ $fastForwardCourse->admission_text }}</div>
                                </div>
                                <div class="d-flex align-items-start">
                                    <span class="d-inline-flex align-items-center justify-content-center mr-2" style="width: 22px; min-width: 22px; height: 22px; border-radius: 50%; background-color: #f2f4f7; color: #7a828f; font-size: 10px;">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <div class="font-regular text-grey2 font-13" style="line-height: 1.7;">{{ $fastForwardCourse->fees_text }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if($fastForwardCourse->sections->count())
                @foreach($fastForwardCourse->sections as $section)
                    <div class="col-md-12 my-3">
                        <div class="slider-header pt-4 pb-3 px-3">
                            <h6 class="font-black bold font-20 mb-2">{{ $section->heading }}</h6>
                            @if($section->subheading)
                                <div class="font-black text-black font-18 mb-2">{{ $section->subheading }}</div>
                            @endif

                            <ul class="font-regular text-grey2 font-13 ul-logic">
                                @foreach($section->points as $point)
                                    <li>{{ $point->point_text }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            @elseif($fastForwardCourse->detail_content)
                <div class="col-md-12 my-3">
                    <div class="slider-header pt-4 pb-3 px-3">
                        <div class="font-black text-black font-18 mb-3">Course Details</div>
                        <div class="font-regular text-grey2 font-13" style="line-height: 1.8;">
                            {!! $fastForwardCourse->detail_content !!}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
</div>
@endsection
