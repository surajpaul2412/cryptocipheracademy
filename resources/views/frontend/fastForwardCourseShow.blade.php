@extends('layouts.frontend.app')

@section('metas')
<title>Fast Forward {{ $fastForwardCourse->heading }} {{ $fastForwardCourse->subheading }} | Crypto Cipher Academy</title>
<meta name="description" content="{{ \Illuminate\Support\Str::limit(strip_tags($fastForwardCourse->description . ' ' . $fastForwardCourse->highlight_text), 160) }}">
@endsection

@section('css')
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
                        <div class="col-lg-8 col-md-8 col-12">
                            <div class="font-black text-black font-35 mb-2" style="line-height: 0.95;">Fast Forward {{ $fastForwardCourse->heading }} {{ $fastForwardCourse->subheading }}:</div>
                            <div class="mb-3">
                                <div class="d-inline-block font-regular font-13 text-black uppercase mr-2 mb-2" style="padding: 7px 18px; border-radius: 999px; background: linear-gradient(to bottom, #ffffff 0%, #ececf1 100%); box-shadow: 0 4px 12px rgba(16, 24, 40, 0.14);">
                                    {{ $fastForwardCourse->badge_text }}
                                </div>
                                <div class="d-inline-block font-regular font-13 text-black uppercase mb-2" style="padding: 7px 18px; border-radius: 999px; background: linear-gradient(to bottom, #ffffff 0%, #ececf1 100%); box-shadow: 0 4px 12px rgba(16, 24, 40, 0.14);">
                                    {{ $fastForwardCourse->event_badge_text }}
                                </div>
                            </div>
                            <div class="font-regular text-grey2 font-16 mb-3 pr-md-4" style="line-height: 1.65;">
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
                                    <div class="font-regular text-grey2 font-16" style="line-height: 1.45;">{{ $fastForwardCourse->time_text }}</div>
                                </div>
                                <div class="d-flex align-items-start mb-2">
                                    <span class="d-inline-flex align-items-center justify-content-center mr-2" style="width: 22px; min-width: 22px; height: 22px; border-radius: 50%; background-color: #f2f4f7; color: #7a828f; font-size: 10px;">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <div class="font-regular text-grey2 font-16" style="line-height: 1.45;">{{ $fastForwardCourse->seats_text }}</div>
                                </div>
                                <div class="d-flex align-items-start mb-2">
                                    <span class="d-inline-flex align-items-center justify-content-center mr-2" style="width: 22px; min-width: 22px; height: 22px; border-radius: 50%; background-color: #f2f4f7; color: #7a828f; font-size: 10px;">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <div class="font-regular text-grey2 font-16" style="line-height: 1.45;">{{ $fastForwardCourse->admission_text }}</div>
                                </div>
                                <div class="d-flex align-items-start">
                                    <span class="d-inline-flex align-items-center justify-content-center mr-2" style="width: 22px; min-width: 22px; height: 22px; border-radius: 50%; background-color: #f2f4f7; color: #7a828f; font-size: 10px;">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <div class="font-regular text-grey2 font-16" style="line-height: 1.45;">{{ $fastForwardCourse->fees_text }}</div>
                                </div>
                            </div>
                            <div class="row align-items-end pt-2">
                                <div class="col-md-8 col-12 font-regular text-grey2 font-16" style="line-height: 1.55;">
                                    <div><span class="text-black bold uppercase">Admissions :</span> {{ $fastForwardCourse->contact_phone }}</div>
                                    <div><span class="text-black bold uppercase">Website:</span> {{ $fastForwardCourse->website }}</div>
                                </div>
                                <div class="col-md-4 col-12 text-md-right mt-3 mt-md-0">
                                    <a href="{{ url('our-courses') }}">
                                        <div class="font-regular mb-0 page-12-btn d-inline-block px-4">
                                            BACK TO COURSES
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 d-flex justify-content-center mt-3 mt-md-0">
                            <div class="w-100 d-flex align-items-center justify-content-center" style="min-height: 100%; height: 100%;">
                                <img src="{{ URL('/') }}/images/fastForwardCourse/{{ $fastForwardCourse->image }}" alt="{{ $fastForwardCourse->heading }}" style="max-width: 100%; width: auto; height: 100%; max-height: 420px; object-fit: contain; object-position: center; filter: drop-shadow(0 10px 18px rgba(18, 26, 43, 0.18));">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if($fastForwardCourse->sections->count())
                @foreach($fastForwardCourse->sections as $section)
                    <div class="col-md-12 my-3">
                        <div class="slider-header pt-4 pb-3 px-3">
                            <div class="font-black text-black font-35 mb-2" style="line-height: 1.25;">{{ $section->heading }}</div>
                            @if($section->subheading)
                                <div class="font-black text-black font-20 mb-4" style="line-height: 1.45;">{{ $section->subheading }}</div>
                            @endif

                            @foreach($section->points as $point)
                                <div class="d-flex align-items-start mb-4">
                                    <div class="pr-3 pt-1" style="color: #6bb51e; font-size: 20px; min-width: 32px;">
                                        <i class="fas fa-book-open"></i>
                                    </div>
                                    <div class="font-regular text-grey2 font-16" style="line-height: 1.75;">
                                        {{ $point->point_text }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @elseif($fastForwardCourse->detail_content)
                <div class="col-md-12 my-3">
                    <div class="slider-header pt-4 pb-3 px-3">
                        <div class="font-black text-black font-35 mb-3">Course Details</div>
                        <div class="font-regular text-grey2 font-16" style="line-height: 1.8;">
                            {!! $fastForwardCourse->detail_content !!}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
</div>
@endsection
