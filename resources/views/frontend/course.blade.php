@extends('layouts.frontend.app')
@section('metas')
<title>Sound Eng. and Music production Course difference | Crypto Cipher® ( Academy,India)</title>
<meta name="description" content="Crypto Cipher Foundation Music production course in Delhi & Diploma Sound Engineering Course Fees, Syllabus, Faculty, Duration & Admission Procedure.">
@endsection

@section('css')
@endsection


@section('content')
<div class="bg-theme1 main-inner">
    <section class="container slider-header">
        <!-- title -->
        <div class="px-3 pt-4 media-pt-0">
            <h1 class="font-regular text-grey2 pl-2 pb-0 font-13 inner-title uppercase">Music Production & Sound Engineering courses</h1>
            <h4 class="font-black text-black font-35 marT-10">Crypto Cipher Academy Courses</h4>
        </div>
        <!-- tabs and pills -->
         <div class="row px-3 pb-1">
            <div class="col-md-12 mt-3 d-flex" role="tablist" aria-label="Course categories">
            <a class="pr-2 js-course-tab active" href="#main-courses-pane" data-tab-target="#main-courses-pane" role="tab" aria-controls="main-courses-pane" aria-selected="true">
                <div class="font-regular mb-2 mt-2 page-12-btn">
                    Advanced Certificate Programs
                </div>
            </a>
            <a class="pr-2 js-course-tab" href="#fast-forward-pane" data-tab-target="#fast-forward-pane" role="tab" aria-controls="fast-forward-pane" aria-selected="false">
                <div class="font-regular mb-2 mt-2 page-12-btn">
                    Fast-Track Courses
                </div>
            </a>
            </div>
         </div>
        <!-- content -->
        <div class="tab-content px-3 pb-1">
            <div class="tab-pane fade show active" id="main-courses-pane" role="tabpanel">
                <div class="row">
                    @if($academyCourse->count())
                    @foreach($academyCourse as $row)
                    <div class="col-md-12 my-3">
                        <div class="slider-header pt-4 pb-3 px-3">
                            <div class="row">
                                <div class="col-md-1 col-3">
                                    <img src="{{env('image_url')}}/academyCourse/{{$row->image}}" alt="{{$row->heading}}" width="100%">
                                </div>
                                <div class="col-md-11 col-9 px-0 font-regular bold font-18 media-pt-0" style="padding-top: 1%;">
                                    {{$row->heading}}
                                </div>
                            </div>
                            {!! $row->content !!}
                            <a href="{{$row->url}}">
                                <div class="font-regular mb-2 mt-2 page-12-btn">
                                    EXPLORE MORE
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
            <div class="tab-pane fade" id="fast-forward-pane" role="tabpanel">
                <div class="row">
                    @forelse($fastForwardCourses as $row)
                        <div class="col-md-12 my-3">
                            <div class="slider-header pt-4 pb-3 px-3">
                                <div class="row align-items-start">
                                    <div class="col-lg-8 col-md-8 col-12">
                                        <div class="font-black text-black font-35 mb-2" style="line-height: 0.95;">Fast Forward {{ $row->heading }} {{ $row->subheading }}:</div>
                                        <div class="mb-3">
                                            <div class="d-inline-block font-regular font-13 text-black uppercase mr-2 mb-2" style="padding: 7px 18px; border-radius: 999px; background: linear-gradient(to bottom, #ffffff 0%, #ececf1 100%); box-shadow: 0 4px 12px rgba(16, 24, 40, 0.14);">
                                                {{ $row->badge_text }}
                                            </div>
                                            <div class="d-inline-block font-regular font-13 text-black uppercase mb-2" style="padding: 7px 18px; border-radius: 999px; background: linear-gradient(to bottom, #ffffff 0%, #ececf1 100%); box-shadow: 0 4px 12px rgba(16, 24, 40, 0.14);">
                                                12-17 May 2026 | Delhi
                                            </div>
                                        </div>
                                        <div class="font-regular text-grey2 font-16 mb-3 pr-md-4" style="line-height: 1.65;">
                                            {!! nl2br(e($row->description)) !!}
                                            @if($row->highlight_text)
                                                <span class="text-black bold">{{ $row->highlight_text }}</span>
                                            @endif
                                        </div>
                                        <div class="pt-2 pb-2" style="border-top: 1px solid #e4e4ea; border-bottom: 1px solid #e4e4ea;">
                                            <div class="d-flex align-items-start mb-2">
                                                <span class="d-inline-flex align-items-center justify-content-center mr-2" style="width: 22px; min-width: 22px; height: 22px; border-radius: 50%; background-color: #f2f4f7; color: #7a828f; font-size: 10px;">
                                                    <i class="far fa-clock"></i>
                                                </span>
                                                <div class="font-regular text-grey2 font-16" style="line-height: 1.45;">{{ $row->time_text }}</div>
                                            </div>
                                            <div class="d-flex align-items-start mb-2">
                                                <span class="d-inline-flex align-items-center justify-content-center mr-2" style="width: 22px; min-width: 22px; height: 22px; border-radius: 50%; background-color: #f2f4f7; color: #7a828f; font-size: 10px;">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <div class="font-regular text-grey2 font-16" style="line-height: 1.45;">{{ $row->seats_text }}</div>
                                            </div>
                                            <div class="d-flex align-items-start mb-2">
                                                <span class="d-inline-flex align-items-center justify-content-center mr-2" style="width: 22px; min-width: 22px; height: 22px; border-radius: 50%; background-color: #f2f4f7; color: #7a828f; font-size: 10px;">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <div class="font-regular text-grey2 font-16" style="line-height: 1.45;">{{ $row->admission_text }}</div>
                                            </div>
                                            <div class="d-flex align-items-start">
                                                <span class="d-inline-flex align-items-center justify-content-center mr-2" style="width: 22px; min-width: 22px; height: 22px; border-radius: 50%; background-color: #f2f4f7; color: #7a828f; font-size: 10px;">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <div class="font-regular text-grey2 font-16" style="line-height: 1.45;">{{ $row->fees_text }}</div>
                                            </div>
                                        </div>
                                        <div class="font-regular text-grey2 font-16 pt-2" style="line-height: 1.55;">
                                            <div><span class="text-black bold uppercase">Admissions :</span> {{ $row->contact_phone }}</div>
                                            <div><span class="text-black bold uppercase">Website:</span> {{ $row->website }}</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12 text-center mt-3 mt-md-0">
                                        <img src="{{ URL('/') }}/images/fastForwardCourse/{{ $row->image }}" alt="{{ $row->heading }}" style="max-width: 100%; width: 225px; filter: drop-shadow(0 10px 18px rgba(18, 26, 43, 0.18));">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-12 my-3">
                            <div class="slider-header pt-4 pb-3 px-3">
                                <div class="font-regular text-grey2 font-16">No Fast Forward courses available right now.</div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
</div>
@endsection


@section('script')
<script>
    $(function () {
        $('.js-course-tab').on('click', function (event) {
            event.preventDefault();

            const target = $(this).data('tab-target');

            $('.js-course-tab').removeClass('active').attr('aria-selected', 'false');
            $(this).addClass('active').attr('aria-selected', 'true');

            $('#main-courses-pane, #fast-forward-pane').removeClass('show active');
            $(target).addClass('show active');
        });
    });
</script>
@endsection
