@extends('layouts.frontend.app')
@section('metas')
<title>FAQs | Crypto Cipher® ( Academy,India)</title>
<meta name="description" content="Course queries and guidance| Crypto Cipher Academy Sound Engineering & music production course related queries, general queries, hostel and career related queries.">

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What is the duration of the Music Production and Sound Engineering courses?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The Music Production Foundation Course is 3 months, Music Production Diploma Course is 10 months and the Sound Engineering Course is 12 months with hands-on practical."
      }
    },
    {
      "@type": "Question",
      "name": "What is the fee structure for Crypto Cipher®  Academy courses?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Fees vary by course. Please visit the individual course pages for fees or contact us for more."
      }
    },
    {
      "@type": "Question",
      "name": "What are the eligibility criteria to enroll in music production courses?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "No prior qualifications needed. Anyone passionate about music and sound can apply."
      }
    },
    {
      "@type": "Question",
      "name": "Is placement assistance provided after completing the courses?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, we help with job placement, internships, and industry connections."
      }
    },
    {
      "@type": "Question",
      "name": "Are the courses available online or only in-person at the Delhi center?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Courses are offered in-person at our Delhi academy with full studio access."
      }
    },
    {
      "@type": "Question",
      "name": "Do you offer certifications after course completion?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, Crypto Cipher® Academy certificate is awarded after successfully completing each course."
      }
    },
    {
      "@type": "Question",
      "name": "Can I join the course without any prior musical knowledge?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, beginners are welcome. No prior experience is required."
      }
    },
    {
      "@type": "Question",
      "name": "Which course is best for becoming a professional music producer?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The Sound Engineering Diploma is ideal for those seeking full-time careers as music producers."
      }
    },
    {
      "@type": "Question",
      "name": "Do you offer EMI or installment options for fees?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, flexible payment plans and installment options are available. Contact support for details."
      }
    }
  ]
}
</script>


@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        .nav-link{
            color: #6D7178;
        }
        .nav-link:hover{
            color: #6D7178;
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
            color: #202020;
            border-right: 5px solid #02BC4D;
            border-radius: 0;
        }
        .verticle-center{
            position: relative;
            top: 50%;
            transform: translateY(-50%);
            padding-left: 10px;
        }
        .panel{
            margin-bottom: 20px;
        }
    </style>
@endsection


@section('content')
<div class="bg-theme1 main-inner">
    <section class="container slider-header">
        <!-- title -->
        <div class="px-3 pt-4 media-pt-0">
            <h1 class="font-regular text-grey2 pl-2 pb-0 font-13 inner-title uppercase">course related queries<span class="px-2"> | </span>general questions<span class="px-2"> | </span>hostel<span class="px-2"> | </span>career</h1>
            <h4 class="font-black text-black font-35 marT-10">Candidate General Inquiries</h4>
        </div>
        <!-- content -->
        @if($faqs->count())
        <div class="row px-3 pt-2" style="margin-bottom: -8px;">
            @foreach($faqs as $row)
            <div class="col-md-12 col-12 mb-4">
                <div class="slider-header bg-theme px-2 pb-4">
                    <div class="row py-3">
                        <div class="col-md-2 pl-4 col-3">
                            <img class="pr-3" src="{{env('image_url')}}/faq/{{$row->image}}" alt="{{$row->heading}}" width="70px">
                        </div>
                        <div class="col-md-10 col-9">
                            <div class="font-medium text-black font-18">
                                {{$row->heading}}
                            </div>
                        </div>
                    </div>
                    <div class="font-regular text-black font-13 px-2">
                        {!! $row->content !!}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </section>
    <!--  Crypto Cipher Audio Lab - Location | map-->
    <section class="container slider-header px-3 mt-4">
        <div class="row px-3" style="margin-bottom: 5px;">
            <div class="col-md-4 pl-2">
                <div class="">
                    <!-- try -->
                    <ul id="myTabs" class="nav nav-pills" role="tablist" data-tabs="tabs">
                        <li class="nav-item mt-4">
                            <a class="nav-link active" href="#tab1" data-toggle="tab">
                                <div class="row">
                                    <div class="col-md-2 col-2">
                                        <img src="{{ asset('assets/frontend/img/voice-message.svg') }}" alt="voice-message" width="30px">
                                    </div>
                                    <div class="col-md-10 px-0 col-10">
                                        <h6 class="font-13 font-bold verticle-center">Course Related Queries</h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item mt-4">
                            <a class="nav-link" href="#tab2" data-toggle="tab">
                                <div class="row">
                                    <div class="col-md-2 col-2">
                                        <img src="{{ asset('assets/frontend/img/food.svg') }}" alt="food" width="31px">
                                    </div>
                                    <div class="col-md-10 px-0 col-10">
                                        <h6 class="font-13 font-bold verticle-center">General Question</h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item mt-4">
                            <a class="nav-link" href="#tab3" data-toggle="tab">
                                <div class="row">
                                    <div class="col-md-2 col-2">
                                        <img src="{{ asset('assets/frontend/img/XMLID_21_.svg') }}" alt="XMLID_21_" width="27px">
                                    </div>
                                    <div class="col-md-10 px-0 col-10">
                                        <h6 class="font-13 font-bold verticle-center">Hostel</h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item mt-4">
                            <a class="nav-link" href="#tab4" data-toggle="tab">
                                <div class="row">
                                    <div class="col-md-2 col-2">
                                        <img src="{{ asset('assets/frontend/img/career.svg') }}" alt="career" width="29px">
                                    </div>
                                    <div class="col-md-10 px-0 col-10">
                                        <h6 class="font-13 font-bold verticle-center">Career</h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8 pt-4">
                <div class="">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="tab1">
                            <div class="demo1">
                                @if($faqCourse->count())
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <!-- card1 -->
                                    @foreach($faqCourse as $index => $row)
                                    <div class="panel panel-default">
                                        <div class="slider-header bg-theme" role="tab" id="headingcourses{{$index+1}}">
                                            <h2 class="mb-0 pl-3 py-3 font-regular text-black font-16 pr-90" data-toggle="collapse" data-target="#collapsecourses{{$index+1}}" aria-expanded="true" aria-controls="collapsecourses{{$index+1}}">
                                                {{$row->heading}}
                                            </h2>
                                        </div>
                                        <div id="collapsecourses{{$index+1}}" class="panel-collapse collapse <?php if($index+1 == "1"){ echo("show");} ?>" role="tabpanel" aria-labelledby="headingcourses{{$index+1}}">
                                            <div class="panel-body font-regular text-grey2 font-13 px-1 pt-3">
                                                {!! $row->content !!}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="tab2">
                            <!-- card2 -->
                            <div class="demo2">
                                @if($faqGeneral->count())
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    @foreach($faqGeneral as $index => $row)
                                    <div class="panel panel-default">
                                        <div class="slider-header bg-theme" role="tab" id="headingGeneral{{$index+1}}">
                                            <h2 class="mb-0 pl-3 py-3 font-regular text-black font-16 pr-90" data-toggle="collapse" data-target="#collapseGeneral{{$index+1}}" aria-expanded="true" aria-controls="collapseGeneral{{$index+1}}">
                                                {{$row->heading}}
                                            </h2>
                                        </div>
                                        <div id="collapseGeneral{{$index+1}}" class="panel-collapse collapse <?php if($index+1 == "1"){ echo("show");} ?>" role="tabpanel" aria-labelledby="headingGeneral{{$index+1}}">
                                            <div class="panel-body font-regular text-grey2 font-13 px-1 pt-3">
                                                {!! $row->content !!}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="tab3">
                            <!-- card3 -->
                            <div class="demo3">
                                @if($faqHostel->count())
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    @foreach($faqHostel as $index => $row)
                                    <div class="panel panel-default">
                                        <div class="slider-header bg-theme" role="tab" id="headingHostel{{$index+1}}">
                                            <h2 class="mb-0 pl-3 py-3 font-regular text-black font-16 pr-90" data-toggle="collapse" data-target="#collapseHostel{{$index+1}}" aria-expanded="true" aria-controls="collapseHostel{{$index+1}}">
                                                {{$row->heading}}
                                            </h2>
                                        </div>
                                        <div id="collapseHostel{{$index+1}}" class="panel-collapse collapse <?php if($index+1 == "1"){ echo("show");} ?>" role="tabpanel" aria-labelledby="headingHostel{{$index+1}}">
                                            <div class="panel-body font-regular text-grey2 font-13 px-1 pt-3">
                                                {!! $row->content !!}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="tab4">
                            <!-- card4 -->
                            <div class="demo4">
                                @if($faqCareer->count())
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    @foreach($faqCareer as $index => $row)
                                    <div class="panel panel-default">
                                        <div class="slider-header bg-theme" role="tab" id="headingCareer{{$index+1}}">
                                            <h2 class="mb-0 pl-3 py-3 font-regular text-black font-16 pr-90" data-toggle="collapse" data-target="#collapseCareer{{$index+1}}" aria-expanded="true" aria-controls="collapseCareer{{$index+1}}">
                                                {{$row->heading}}
                                            </h2>
                                        </div>
                                        <div id="collapseCareer{{$index+1}}" class="panel-collapse collapse <?php if($index+1 == "1"){ echo("show");} ?>" role="tabpanel" aria-labelledby="headingCareer{{$index+1}}">
                                            <div class="panel-body font-regular text-grey2 font-13 px-1 pt-3">
                                                {!! $row->content !!}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection


@section('script')
@endsection