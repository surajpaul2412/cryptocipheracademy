@extends('layouts.frontend.app')
@section('metas')
<title>Sound Eng. and Music production Course difference | Crypto CipherÂ® ( Academy,India)</title>
<meta name="description" content="Crypto Cipher Foundation Music production course in Delhi & Diploma Sound Engineering Course Fees, Syllabus, Faculty, Duration & Admission Procedure.">
@endsection

@section('css')
<style>
    .course-page-shell {
        padding: 1rem 1.25rem 1.25rem;
    }

    .course-page-tabs {
        display: flex;
        flex-wrap: wrap;
    }

    .course-page-tabs .js-course-tab {
        text-decoration: none;
    }

    .course-page-pane {
        padding-top: 0.25rem;
    }

    .course-page-fast-image-wrap {
        min-height: 100%;
        height: 100%;
    }

    .course-page-fast-image {
        max-width: 100%;
        width: auto;
        height: 100%;
        max-height: 420px;
        object-fit: contain;
        object-position: center;
        filter: drop-shadow(0 10px 18px rgba(18, 26, 43, 0.18));
    }

    .course-page-faq-section {
        margin-top: 0.25rem;
    }

    .course-page-faq-intro {
        min-height: 100%;
    }

    .course-page-faq-icon {
        width: 56px;
        height: 56px;
        min-width: 56px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background-image: linear-gradient(to bottom right, #edeef3, #f4f5f9);
        box-shadow: 2px 2px 5px -1px rgba(0, 0, 0, 0.12), -1px -1px 3px 0 rgba(255, 255, 255, 0.9);
    }

    .course-page-faq-panel {
        margin-bottom: 16px;
    }

    .course-page-faq-panel:last-child {
        margin-bottom: 0;
    }

    .course-page-faq-question {
        cursor: pointer;
    }

    @media only screen and (max-width: 767.98px) {
        .course-page-shell {
            padding: 1rem 0.85rem 1.25rem;
        }

        .course-page-faq-intro {
            margin-bottom: 1rem;
        }
    }
</style>
@endsection


@section('content')
<div class="bg-theme1 main-inner">
    <section class="">
        <div class="slider-header course-page-shell">
            <div class="media-pt-0">
                <h1 class="font-regular text-grey2 pl-2 pb-0 font-13 inner-title uppercase">Music Production & Sound Engineering courses</h1>
                <h4 id="js-course-page-title" class="font-black text-black font-35 marT-10">Crypto Cipher Academy Courses</h4>
            </div>

            <div class="row pb-1">
                <div class="col-md-12 mt-1 course-page-tabs" role="tablist" aria-label="Course categories">
                    <a class="pr-2 js-course-tab active" href="#main-courses-pane" data-tab-target="#main-courses-pane" data-page-title="Crypto Cipher Academy Courses" role="tab" aria-controls="main-courses-pane" aria-selected="true">
                        <div class="font-regular mb-2 mt-2 page-12-btn" style="width: 220px;">
                            Advanced Certificate Programs
                        </div>
                    </a>
                    <a class="pr-2 js-course-tab" href="#fast-forward-pane" data-tab-target="#fast-forward-pane" data-page-title="Crypto Cipher Fast-Track Courses" role="tab" aria-controls="fast-forward-pane" aria-selected="false">
                        <div class="font-regular mb-2 mt-2 page-12-btn">
                            Fast-Track Courses
                        </div>
                    </a>
                </div>
            </div>

            <div class="tab-content course-page-pane">
                <div class="tab-pane fade show active" id="main-courses-pane" role="tabpanel">
                    <div class="row">
                        @if($academyCourse->count())
                            @foreach($academyCourse as $row)
                                <div class="col-md-12 my-3">
                                    <div class="slider-header pt-4 pb-3 px-3">
                                        <div class="row">
                                            <div class="col-md-1 col-3">
                                                <img src="{{ env('image_url') }}/academyCourse/{{ $row->image }}" alt="{{ $row->heading }}" width="100%">
                                            </div>
                                            <div class="col-md-11 col-9 px-0 font-regular bold font-18 media-pt-0" style="padding-top: 1%;">
                                                {{ $row->heading }}
                                            </div>
                                        </div>
                                        {!! $row->content !!}
                                        <a href="{{ $row->url }}">
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
                            @php
                                $detailUrl = $row->slug
                                    ? route('fast-forward-courses.show', $row->slug)
                                    : 'javascript:void(0)';
                            @endphp
                            <div class="col-md-12 my-3">
                                <div class="slider-header pt-4 pb-3 px-3">
                                    <div class="row align-items-stretch">
                                        <div class="col-lg-8 col-md-8 col-12">
                                            <div class="font-black text-black font-35 mb-2" style="line-height: 0.95;">Fast Forward {{ $row->heading }} {{ $row->subheading }}:</div>
                                            <div class="mb-3">
                                                <div class="d-inline-block font-regular font-13 text-black uppercase mr-2 mb-2" style="padding: 7px 18px; border-radius: 999px; background: linear-gradient(to bottom, #ffffff 0%, #ececf1 100%); box-shadow: 0 4px 12px rgba(16, 24, 40, 0.14);">
                                                    {{ $row->badge_text }}
                                                </div>
                                                <div class="d-inline-block font-regular font-13 text-black uppercase mb-2" style="padding: 7px 18px; border-radius: 999px; background: linear-gradient(to bottom, #ffffff 0%, #ececf1 100%); box-shadow: 0 4px 12px rgba(16, 24, 40, 0.14);">
                                                    {{ $row->event_badge_text }}
                                                </div>
                                            </div>
                                            <div class="font-regular text-grey2 font-13 mb-3 pr-md-4" style="line-height: 1.8;">
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
                                                    <div class="font-regular text-grey2 font-13" style="line-height: 1.7;">{{ $row->time_text }}</div>
                                                </div>
                                                <div class="d-flex align-items-start mb-2">
                                                    <span class="d-inline-flex align-items-center justify-content-center mr-2" style="width: 22px; min-width: 22px; height: 22px; border-radius: 50%; background-color: #f2f4f7; color: #7a828f; font-size: 10px;">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                    <div class="font-regular text-grey2 font-13" style="line-height: 1.7;">{{ $row->seats_text }}</div>
                                                </div>
                                                <div class="d-flex align-items-start mb-2">
                                                    <span class="d-inline-flex align-items-center justify-content-center mr-2" style="width: 22px; min-width: 22px; height: 22px; border-radius: 50%; background-color: #f2f4f7; color: #7a828f; font-size: 10px;">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                    <div class="font-regular text-grey2 font-13" style="line-height: 1.7;">{{ $row->admission_text }}</div>
                                                </div>
                                                <div class="d-flex align-items-start">
                                                    <span class="d-inline-flex align-items-center justify-content-center mr-2" style="width: 22px; min-width: 22px; height: 22px; border-radius: 50%; background-color: #f2f4f7; color: #7a828f; font-size: 10px;">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                    <div class="font-regular text-grey2 font-13" style="line-height: 1.7;">{{ $row->fees_text }}</div>
                                                </div>
                                            </div>
                                            <div class="row align-items-end pt-2">
                                                <div class="col-md-8 col-12 font-regular text-grey2 font-13" style="line-height: 1.7;">
                                                    <div><span class="text-black bold uppercase">Admissions :</span> {{ $row->contact_phone }}</div>
                                                    <div><span class="text-black bold uppercase">Website:</span> {{ $row->website }}</div>
                                                </div>
                                                <div class="col-md-4 col-12 text-md-right mt-3 mt-md-0">
                                                    <a href="{{ $detailUrl }}">
                                                        <div class="font-regular mb-0 page-12-btn d-inline-block px-4">
                                                            VIEW DETAILS
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-12 d-flex justify-content-center mt-3 mt-md-0">
                                            <div class="course-page-fast-image-wrap w-100 d-flex align-items-center justify-content-center">
                                                <img src="{{ URL('/') }}/images/fastForwardCourse/{{ $row->image }}" alt="{{ $row->heading }}" class="course-page-fast-image">
                                            </div>
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

                        @if($fastForwardFaqs->count())
                            <div class="col-md-12 my-3 course-page-faq-section">
                                <div class="slider-header bg-theme px-3 py-4">
                                    <div class="row">
                                        <div class="col-md-4 pt-2">
                                            <div class="slider-header bg-theme px-3 py-4 course-page-faq-intro">
                                                <div class="d-flex align-items-center mb-3">
                                                    <div class="course-page-faq-icon">
                                                        <img src="{{ asset('assets/frontend/img/voice-message.svg') }}" alt="Fast-Track FAQ" width="26">
                                                    </div>
                                                    <div class="pl-3">
                                                        <div class="font-regular text-grey2 font-13 uppercase">Fast-Track Courses</div>
                                                        <div class="font-black text-black font-20">Common FAQs</div>
                                                    </div>
                                                </div>
                                                <div class="font-regular text-grey2 font-13 pr-md-3" style="line-height: 1.8;">
                                                    Common questions about schedules, admission, seats and course planning for Fast-Track Courses.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 pt-2">
                                            <div class="panel-group" id="fastTrackCourseFaqAccordion" role="tablist" aria-multiselectable="true">
                                                @foreach($fastForwardFaqs as $index => $faqRow)
                                                    <div class="panel panel-default course-page-faq-panel">
                                                        <div class="slider-header bg-theme" role="tab" id="headingFastTrackFaq{{ $index + 1 }}">
                                                            <h2 class="mb-0 pl-3 py-3 font-regular text-black font-16 pr-90 course-page-faq-question" data-toggle="collapse" data-target="#collapseFastTrackFaq{{ $index + 1 }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapseFastTrackFaq{{ $index + 1 }}">
                                                                {{ $faqRow->heading }}
                                                            </h2>
                                                        </div>
                                                        <div id="collapseFastTrackFaq{{ $index + 1 }}" class="panel-collapse collapse {{ $index === 0 ? 'show' : '' }}" role="tabpanel" aria-labelledby="headingFastTrackFaq{{ $index + 1 }}" data-parent="#fastTrackCourseFaqAccordion">
                                                            <div class="panel-body font-regular text-grey2 font-13 px-1 pt-3">
                                                                {!! $faqRow->content !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection


@section('script')
<script>
    $(function () {
        const pageTitle = $('#js-course-page-title');

        $('.js-course-tab').on('click', function (event) {
            event.preventDefault();

            const target = $(this).data('tab-target');
            const nextTitle = $(this).data('page-title');

            $('.js-course-tab').removeClass('active').attr('aria-selected', 'false');
            $(this).addClass('active').attr('aria-selected', 'true');

            $('#main-courses-pane, #fast-forward-pane').removeClass('show active');
            $(target).addClass('show active');

            if (nextTitle && pageTitle.length) {
                pageTitle.text(nextTitle);
            }
        });
    });
</script>
@endsection
