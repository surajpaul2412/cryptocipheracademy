@extends('layouts.frontend.app')

@section('metas')
<title>Top Music Production & Sound Engineering Course in Delhi, India | Crypto Cipher® ( Academy,India)</title>
<meta name="description" content="Join the top Music Production & Sound Engineering Course in Delhi, India at Crypto Cipher®. Learn professional skills in sound design, mixing, mastering, and music theory. Hands-on training for producers, engineers, and composers aiming for studio and live success.Enroll now!">


<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Course",
      "@id": "https://www.cryptocipheracademy.com/music-production-diploma-course#course",
      "name": "Music Production Diploma Course",
      "url": "https://www.cryptocipheracademy.com/music-production-diploma-course",
      "description": "10‑month advanced music production diploma program in India. Learn professional audio techniques, DAWs, mixing, mastering, and industry‑standard studio skills.",
      "provider": {
        "@type": "Organization",
        "@id": "https://www.cryptocipheracademy.com#organization",
        "name": "Crypto Cipher® Academy",
        "url": "https://www.cryptocipheracademy.com"
      },
      "offers": {
        "@type": "Offer",
        "url": "https://www.cryptocipheracademy.com/music-production-diploma-course",
        "priceCurrency": "INR",
        "price": "90000",
        "availability": "https://schema.org/InStock",
        "validFrom": "2025-07-21",
        "category": "Paid"
      },
      "hasCourseInstance": {
        "@type": "CourseInstance",
        "courseMode": "Onsite",
        "startDate": "2025-08-01",
        "endDate": "2026-06-01",
        "courseSchedule": {
          "@type": "Schedule",
          "repeatCount": 10,
          "repeatFrequency": "Monthly"
        },
        "location": {
          "@type": "Place",
          "name": "Crypto Cipher® Academy Delhi Campus",
          "address": {
            "@type": "PostalAddress",
            "streetAddress": "Delhi Campus",
            "addressLocality": "Delhi",
            "addressRegion": "DL",
            "addressCountry": "IN"
          }
        },
        "offers": {
          "@type": "Offer",
          "url": "https://www.cryptocipheracademy.com/music-production-diploma-course",
          "priceCurrency": "INR",
          "price": "90000",
          "availability": "https://schema.org/InStock",
          "validFrom": "2025-07-21",
          "category": "Paid"
        }
      }
    },
    {
      "@type": "FAQPage",
      "@id": "https://www.cryptocipheracademy.com/music-production-diploma-course#faq",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "What is the duration of the Music Production Diploma?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "The diploma course spans 10 months, providing comprehensive training in all aspects of modern music production."
          }
        },
        {
          "@type": "Question",
          "name": "Who is this diploma program designed for?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "This course is ideal for intermediate to advanced learners seeking a career in music production."
          }
        },
        {
          "@type": "Question",
          "name": "What modules are covered in the diploma?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Modules include DAW mastery, music theory, sound design & synthesis, mixing, mastering, and project-based learning."
          }
        },
        {
          "@type": "Question",
          "name": "Is this a certified diploma?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes, students receive a recognized diploma certificate upon successful course completion."
          }
        },
        {
          "@type": "Question",
          "name": "What are the career opportunities after this diploma?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Graduates can pursue careers as music producers, sound designers, mixing engineers, or freelance composers."
          }
        }
      ]
    }
  ]
}
</script>


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
    .box-shadow{
        box-shadow: 2px 2px 4px 0px rgba(50,50,50,0.10), -2px -2px 3px 0px rgba(255,255,255,0.8);
        background-image: linear-gradient(to right, #edeef3 , #f4f5f9);
        border: 5px solid rgba(255,255,255,0.3);
    }
    @media only screen and (min-width: 600px) {
        .pt-md-50{
            padding-top: 55px;
        }
    }
    .Main__Container-sc-1n4ud0o-0 > a, .eapps-widget-toolbar{display: none !important;}
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
            <h1 class="font-regular text-grey2 pl-2 pb-0 font-13 inner-title uppercase">Advanced Music Production Course</h1>
            <h4 class="font-black text-black font-35 marT-10">Music Production Diploma Course</h4>
        </div>
        <!-- content -->
        <div class="row px-3 media-px-2">
            <div class="col-md-6 my-2">
                <div class="media-px-2" align="left">
                    @if($musicProductionDiploma->count())
                    @foreach($musicProductionDiploma as $row)
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
                    <h4 class="font-black text-black font-18">Who Can Enroll Music Production Diploma Course?</h4>
                    <ul class="font-regular text-black font-13 pl-0 pr-3 pt-2 quick-info">
                        @if($sound->count())
                        @foreach($sound as $row)
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
        <!-- title -->
        <!-- <div class="px-2 pt-4 pl-0">
            <h4 class="font-black text-black font-18">Logic Pro X & Ableton Live </h4>
        </div> -->
        <!-- content -->
        <div class="row">
            @if($logicAbleton->count())
            @foreach($logicAbleton as $row)
            <div class="col-md-12 col-12 mx-2">
                {!! $row->content !!}
            </div>
            @endforeach
            @endif
            <div class="col-md-12 mx-2 pt-2">
                @if($overview->count())
                <h4 class="font-black text-black font-18">Overview Of the module</h4>
                <ul class="font-regular text-grey2 font-13 ul-logic">
                    @foreach($overview as $row)
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
    @if($modules->count())
    @foreach($modules as $row)
    <section class="container slider-header mt-4" id="{{ str_replace(' ', '', $row->heading) }}">
        <!-- content -->
        <div class="row mx-2 media-mx-0">
            <div class="col-md-12 col-12 py-2">
                <div class="pb-3">
                    <h6 class="font-black bold font-20"><span><img alt="{{$row->heading}}" class="pr-3 media-studio-img" src="{{env('image_url')}}/module/{{$row->icon}}" width="6%"></span>{{$row->heading}}</h6>
                    <div class="font-regular pb-3 font-13 text-grey2">
                        {!! $row->content !!}
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-5 col-12 py-3" align="right">
                <div class="box-shadow">
                    <img src="{{env('image_url')}}/module/{{$row->image}}" alt="{{$row->heading}}" class="media-w-100" width="100%">
                </div>
            </div> -->
        </div>
    </section>
    @endforeach
    @endif
    <section class="container slider-header mt-4 p-4">
        <h2 class="font-black text-black font-18 pt-3 pb-4" align="center">"Our Students Experience"</h2>
        <div class="row">
            <!-- col 1 -->
            <div class="col-md-4 col-12">
                <!-- card start -->
                <div class="card p-4 mb-4" style="border-radius: 15px;">
                  <div class="card-block">
                    <div class="card-text good-review-score float-left">
                      <img src="https://lh3.googleusercontent.com/a/ACg8ocLmlvfEVFmKJYLdAAvROXV6VM8499CAl1AthZ4wK8hvd-aG8A=w45-h45-p-rp-mo-br100">
                    </div>
                    <div class="card-title ml-4 pl-4">
                      <div class="pl-2">Tali Mollier ( Nagaland )</div>
                      <div class="pl-2" style="margin-top: -5px;">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                      </div>
                    </div>
                  </div>
                  <div class="card-block">
                    <h6 class="card-text font-13">As I was going around looking for an academy to study sound engineering and production in and around Delhi, I came across Crypto Cipher and since I was coming over from a different state, I was quite nervous and a little reluctant to choose which institute will suit the best for me. And after I arrived in Delhi and I came over the academy to see how it actually is, then I finally made up my decision and started studying in this academy, which is now 4 months running. I can say without any hesitation that the decision I made to join Crypto Cipher was worth it. I've gained a lot of knowledge and learnt a lot of things in this 4 months and there's yet more to come. The knowledge they embark here is very much systematic and useful. The teachers in this academy are very helpful towards the students and they have a very positive impact on us. Thank you Crypto Cipher</h6>
                    <div class="font-13" align="right">
                      <a href="https://g.co/kgs/CX8WfZa" target="_blank">:Source</a>
                    </div>
                  </div>
                </div>
                <!-- card end -->

                <!-- card start -->
                <div class="card p-4 mb-4" style="border-radius: 15px;">
                  <div class="card-block">
                    <div class="card-text good-review-score float-left">
                      <img src="https://lh3.googleusercontent.com/a/ACg8ocIdKzONBb7DpgkyN6UtuJBpXFktOkOQRfkRrsKmsOtVrqQubzEk=w45-h45-p-rp-mo-br100">
                    </div>
                    <div class="card-title ml-4 pl-4">
                      <div class="pl-2">Himanshi Rai</div>
                      <div class="pl-2" style="margin-top: -5px;">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                      </div>
                    </div>
                  </div>
                  <div class="card-block">
                    <h6 class="card-text font-13">This Academy is the best place to learn, the teaching pattern is something you adore because as a student you need to get comfortable with the teacher and the teaching and way we get taught here is appreciative. The equipments provided to us is of such quality, that I and my batchmates had a great time learning with them, I'm really glad I am studying here, I found some great friends and mentors; I am looking forward to learning more and getting familiar with the technicalities.</h6>
                    <div class="font-13" align="right">
                      <a href="https://g.co/kgs/79SbA4Y" target="_blank">:Source</a>
                    </div>
                  </div>
                </div>
                <!-- card end -->
                <!-- card start -->
                <div class="card p-4 mb-4" style="border-radius: 15px;">
                    <div class="card-block">
                        <div class="card-text good-review-score float-left">
                            <img src="https://lh3.googleusercontent.com/a-/ALV-UjUb8asIpt0hUGC0GYRYEev6iOxHbFW0JIMZEJDzoVBRlTnCwdFF=w45-h45-p-rp-mo-br100">
                        </div>
                        <div class="card-title ml-4 pl-4">
                            <div class="pl-2">Aditya</div>
                            <div class="pl-2" style="margin-top: -5px;">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                            </div>
                        </div>                        
                    </div>
                    <div class="card-block">
                        <h6 class="card-text font-13">One of the best places in India for learning about Music, sound and production. The course is well defined and structured, and the teachers put in a lot of effort to make sure each student learns well and is taken care of. Thanks to Sumit sir for founding the academy, and sharing his wisdom and insights with a lot of love and care! Thanks to Rio sir for his brilliance and clarity, and for showing us what matters! Thanks to Sahitya sir for his sincerty and warmth, making sure we learn each topic with enjoyment! Highly recommended</h6>
                        <div class="font-13" align="right">
                            <a href="https://g.co/kgs/HYqdiv9" target="_blank">:Source</a>
                        </div>
                    </div>
                </div>
                <!-- card end -->

                <!-- card start -->
                <div class="card p-4 mb-4" style="border-radius: 15px;">
                    <div class="card-block">
                        <div class="card-text good-review-score float-left">
                            <img src="https://lh3.googleusercontent.com/a/ACg8ocKVg3vvy5IiUVpVCesZK_mda0_24uvYSAHpi0Jx2fc4eDMTcg=w45-h45-p-rp-mo-br100">
                        </div>
                        <div class="card-title ml-4 pl-4">
                            <div class="pl-2">HARSH SONARE</div>
                            <div class="pl-2" style="margin-top: -5px;">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                            </div>
                        </div>                        
                    </div>
                    <div class="card-block">
                        <h6 class="card-text font-13">The teaching faculty are very nice, accommodating and all the teacher here are very knowledgeable. The curriculum of music production and sound engineering are well planned and teach everything that a student should know while making own music. Overall one of the best institute in Delhi.</h6>
                        <div class="font-13" align="right">
                            <a href="https://g.co/kgs/sDqTNau" target="_blank">:Source</a>
                        </div>
                    </div>
                </div>
                <!-- card end -->

                <!-- card start -->
                <div class="card p-4 mb-4" style="border-radius: 15px;">
                    <div class="card-block">
                        <div class="card-text good-review-score float-left">
                            <img src="https://lh3.googleusercontent.com/a-/ALV-UjWTsU1BwGKKLmA45_7Wlq2lw-Ns6hyu0L3plIaqstb5VNOmoKWy=w45-h45-p-rp-mo-br100">
                        </div>
                        <div class="card-title ml-4 pl-4">
                            <div class="pl-2">Tony (Wacky Perme ) Arunachal Pradesh</div>
                            <div class="pl-2" style="margin-top: -5px;">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                            </div>
                        </div>                        
                    </div>
                    <div class="card-block">
                        <h6 class="card-text font-13">Teachers are very co-operative... I went to another institute a year ago and I didn't get a nice experience... My time got wasted. I highly recommend this institute for musicians who want to learn more. Your search here is over. I was completely impressed with their professionalism. Teachers are consistently outstanding, exceeding my expectations every time.</h6>
                        <div class="font-13" align="right">
                            <a href="https://g.co/kgs/MVL9R7R" target="_blank">:Source</a>
                        </div>
                    </div>
                </div>
                <!-- card end -->

                <!-- card start | new section -->
                <div class="card p-4 mb-4" style="border-radius: 15px;">
                    <div class="card-block">
                        <div class="card-text good-review-score float-left">
                            <img src="https://lh3.googleusercontent.com/a-/AD5-WCmkWfM4n6WxvL_eN4RgIAcVmQAABqeasWbB81Ah=w45-h45-p-rp-mo-br100">
                        </div>
                        <div class="card-title ml-4 pl-4">
                            <div class="pl-2">critter purush</div>
                            <div class="pl-2" style="margin-top: -5px;">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                            </div>
                        </div>                        
                    </div>
                    <div class="card-block">
                        <h6 class="card-text font-13">Honestly speaking, Crypto Cipher offers you much more than you would expect from any place Elsewhere in this Field. Faculty members are so Interactive, Helpful, Knowledgeable and Sincere about their Work that it Exceeded my Expectations. Each and Every single class is taken very seriously and students are there by reminded from time to time not miss any of the classes within this course so that they can learn and understand each and every step of the Process. Not just the Music Production and Mixing-Mastering but you will always get to know and experience much more than the area of knowledge you would expect from an Institution such as this. More or Less this is the Best Place if you are willing to give your Learning the best chance in the field of Audio!</h6>
                        <div class="font-13" align="right">
                            <a href="https://goo.gl/maps/X16euBxkgujfHgNu7" target="_blank">:Source</a>
                        </div>
                    </div>
                </div>
                <!-- card end -->
                <!-- card start -->
                <div class="card p-4 mb-4" style="border-radius: 15px;">
                    <div class="card-block">
                        <div class="card-text good-review-score float-left">
                            <img src="https://lh3.googleusercontent.com/a-/ACNPEu9cgVET87xgjQpS45lFsyrljbnecJLLDJsM8Jnbl38=w45-h45-p-rp-mo-br100">
                        </div>
                        <div class="card-title ml-4 pl-4">
                            <div class="pl-2">Gaurav Kapoor</div>
                            <div class="pl-2" style="margin-top: -5px;">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                            </div>
                        </div>                        
                    </div>
                    <div class="card-block">
                        <h6 class="card-text font-13">Crypto Cipher gives you a very wholesome perspective on understanding sound and then music. I have been here for about 3 months now and I must say that each and every module is designed very deeply and accurately. They don’t take too much of your time but make sure to give you good amounts of content to practise. After spending about 3 months here, I personally feel that the course has given me a boost to envision great aspects of sound designing, background film scoring, synthesis and a lot more being taught here in the course.<br><br>The ambience is very professional yet friendly, giving you a good studio, a very good quality of instruments and mics, a comfortable classroom to study. All of this adds to a great sense of professionalism which is extremely important for us students.<br><br>The teachers are humble, supportive and inspiring, they never hesitate to answer your doubts.They are equipped with skills  and believe that “ Knowledge is power”. You get a sense of their warmth right from the first counselling session conducted by Mr Sat Prakash which is a must in my opinion. The session broadly talks about your understanding and expectations with the course and what to expect from the academy, doing this you would know whether this course is for you or not.<br><br>All in all if you are willing to work and love music, then this is the place for you.</h6>
                        <div class="font-13" align="right">
                            <a href="https://g.co/kgs/aTikpi" target="_blank">:Source</a>
                        </div>
                    </div>
                </div>
                <!-- card end -->
                <div class="card p-4 mb-4" style="border-radius: 15px;">
                    <div class="card-block">
                        <div class="card-text good-review-score float-left">
                            <img src="https://lh3.googleusercontent.com/a-/ACNPEu8P5PxDQjJfH27Ez0c4KtMj4K8P1qe5CaaP61vlBQ=w45-h45-p-rp-mo-br100">
                        </div>
                        <div class="card-title ml-4 pl-4">
                            <div class="pl-2">Nattrasz</div>
                            <div class="pl-2" style="margin-top: -5px;">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                            </div>
                        </div>                        
                    </div>
                    <div class="card-block">
                        <h6 class="card-text font-13">Most innovative learning experience. Genuine teaching pattern. My personal experience was superb at crypto cipher academy. Teachers are really helpful. They cover each detailed topic of music production and sound engineering. My highly recommendation to all the upcoming music learner’s to just visit the academy once and check the enhance learning environment.<br><br>Thanks Team Crypto Cipher for turning out my inner music soul into a professional music producer.</h6>
                        <div class="font-13" align="right">
                            <a href="https://g.co/kgs/qjxaQS" target="_blank">:Source</a>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- col 2 -->
            <div class="col-md-4 col-12">
                <!-- card start -->
                <div class="card p-4 mb-4" style="border-radius: 15px;">
                  <div class="card-block">
                    <div class="card-text good-review-score float-left">
                      <img src="https://lh3.googleusercontent.com/a-/ALV-UjWcjrl4vLNnPYrQ6anXvXUeBq6Ud9qzl0lkgDApZqARuBC4gXIY=w45-h45-p-rp-mo-br100">
                    </div>
                    <div class="card-title ml-4 pl-4">
                      <div class="pl-2">Tenzin Younten ( Ladakh )</div>
                      <div class="pl-2" style="margin-top: -5px;">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                      </div>
                    </div>
                  </div>
                  <div class="card-block">
                    <h6 class="card-text font-13">I am extremely happy that I am able to get enrolled here and get to learn from the best, as we all say "to be the best learn from the best". The reason why this institute stands out from the rest is because of the systematic structure of the courses, Tutors are really helpful and knowledgeable. This is my fourth month here in this institute and I can proudly say that I have learned a lot, I cannot wait to learn more going forward. By the way, I am the first ever student from Ladakh to enroll here and I feel good about it. Cheers!</h6>
                    <div class="font-13" align="right">
                      <a href="https://g.co/kgs/RBoiR5L" target="_blank">:Source</a>
                    </div>
                  </div>
                </div>
                <!-- card end -->

                <!-- card start -->
                <div class="card p-4 mb-4" style="border-radius: 15px;">
                  <div class="card-block">
                    <div class="card-text good-review-score float-left">
                      <img src="https://lh3.googleusercontent.com/a/ACg8ocIp3h1o4adV44fxvHf1NJu-HRZqM77io4FXQW4UX92kdD-sqg=w45-h45-p-rp-mo-br100">
                    </div>
                    <div class="card-title ml-4 pl-4">
                      <div class="pl-2">Vidya Gaur</div>
                      <div class="pl-2" style="margin-top: -5px;">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                      </div>
                    </div>
                  </div>
                  <div class="card-block">
                    <h6 class="card-text font-13">Any music lover who wants to further their knowledge, I would definitely recommend this place. They are thorough with their teachings process which helps one plan out how to intake the knowledge given.</h6>
                    <div class="font-13" align="right">
                      <a href="https://g.co/kgs/vMLYDgF" target="_blank">:Source</a>
                    </div>
                  </div>
                </div>
                <!-- card end -->
                <!-- card start -->
                <div class="card p-4 mb-4" style="border-radius: 15px;">
                    <div class="card-block">
                        <div class="card-text good-review-score float-left">
                            <img src="https://lh3.googleusercontent.com/a-/ALV-UjVeeN3ZIFH899ocQT6nlku_0SONzzEeVw0PPtj3D7tuBZ9NkGA=w45-h45-p-rp-mo-br100">
                        </div>
                        <div class="card-title ml-4 pl-4">
                            <div class="pl-2">Aritra ( Calcutta )</div>
                            <div class="pl-2" style="margin-top: -5px;">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                            </div>
                        </div>                        
                    </div>
                    <div class="card-block">
                        <h6 class="card-text font-13">Had an awesome experience with CCA. Faculties are pretty good, if required students get one on one classes. The curriculum is at par with all leading global music schools like Barklee, Trinity etc. I wish I would have come over here earlier:)</h6>
                        <div class="font-13" align="right">
                            <a href="https://g.co/kgs/TAHFVTn" target="_blank">:Source</a>
                        </div>
                    </div>
                </div>
                <!-- card end -->

                <!-- card start -->
                <div class="card p-4 mb-4" style="border-radius: 15px;">
                    <div class="card-block">
                        <div class="card-text good-review-score float-left">
                            <img src="https://lh3.googleusercontent.com/a-/ALV-UjVgQq9mU3iuKiDL0hQbhn713KzJq6GYYKcC8TTw9WHT3Q-Nr5VO=w45-h45-p-rp-mo-br100">
                        </div>
                        <div class="card-title ml-4 pl-4">
                            <div class="pl-2">Krishna Singh</div>
                            <div class="pl-2" style="margin-top: -5px;">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                            </div>
                        </div>                        
                    </div>
                    <div class="card-block">
                        <h6 class="card-text font-13">Hello everyone, I am learning music production and sound engineering here since July 2024 and would recommend you to join here because of the cooperative nature of the faculty, good music equipments availability, proper studio vibes, limited student batch (full attention received). And a few more things. I have seen advertisements on social media platforms which say learn music production within 3 months etc. but my personal opinion is you cannot learn and be a good producer in such short time. The faculty here teaches from step 1 and every minor thing is covered for knowledge, and I believe you have to give proper time in order to gain full knowledge. So my recommendation is CRYPTO CYPHER ACADEMY. 👍</h6>
                        <div class="font-13" align="right">
                            <a href="https://g.co/kgs/Acu3BN1" target="_blank">:Source</a>
                        </div>
                    </div>
                </div>
                <!-- card end -->

                <div class="card p-4 mb-4" style="border-radius: 15px;">
                    <div class="card-block">
                        <div class="card-text good-review-score float-left">
                            <img src="https://lh3.googleusercontent.com/a-/ACNPEu9mqZpRKu3aohiVlWzSOWj5YAQ6BlViAbgIwwxb0A=w45-h45-p-rp-mo-br100">
                        </div>
                        <div class="card-title ml-4 pl-4">
                            <div class="pl-2">YOGESH VERMA</div>
                            <div class="pl-2" style="margin-top: -5px;">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                            </div>
                        </div>                        
                    </div>
                    <div class="card-block">
                        <h6 class="card-text font-13">This is the best academy that I have got in for music production. It doesn't limit us in just software but as well as help us to create our own music. It really opened my mind about music production as whole. It really helped me in understanding music production concepts. Sumit sir is very humble and helpful. Crypto cypher is the only academy who make Indian classical softwares. It is only one of its kind in India. I would highly recommend this academy to my friends who want to peruse their career in music production.</h6>
                        <div class="font-13" align="right">
                            <a href="https://g.co/kgs/BbjCB2" target="_blank">:Source</a>
                        </div>
                    </div>
                </div>
                <div class="card p-4 mb-4" style="border-radius: 15px;">
                    <div class="card-block">
                        <div class="card-text good-review-score float-left">
                            <img src="https://lh3.googleusercontent.com/a-/ACNPEu-1ET09EGdOMRDWtlb40fD098npPf4WduJqbjmMpmM=w45-h45-p-rp-mo-br100">
                        </div>
                        <div class="card-title ml-4 pl-4">
                            <div class="pl-2">Manya Narang</div>
                            <div class="pl-2" style="margin-top: -5px;">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                            </div>
                        </div>                        
                    </div>
                    <div class="card-block">
                        <h6 class="card-text font-13">Extraordinary Faculty, Extraordinary Experience Of Learning.... Here, the teachers give you the freedom to do mistakes and learn on your own... THE BEST PLACE FOR LEARNING EVER.... What you'll get from here ?? - WINGS TO FLY..!!! 😇 Thank you Sumit Sir and Hemant Sir..!! Can Never Forget What You Taught Me... You Rock !! 🙏.</h6>
                        <div class="font-13" align="right">
                            <a href="https://g.co/kgs/USJSoq" target="_blank">:Source</a>
                        </div>
                    </div>
                </div>
                <div class="card p-4 mb-4" style="border-radius: 15px;">
                    <div class="card-block">
                        <div class="card-text good-review-score float-left">
                            <img src="https://lh3.googleusercontent.com/a-/ACNPEu-xokhmo6mQortMln6j4Giv1L4Zx2-y9nUovPTgCw=w45-h45-p-rp-mo-br100">
                        </div>
                        <div class="card-title ml-4 pl-4">
                            <div class="pl-2">Sumit Padmajan</div>
                            <div class="pl-2" style="margin-top: -5px;">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                            </div>
                        </div>                        
                    </div>
                    <div class="card-block">
                        <h6 class="card-text font-13">I joined crypto cipher 4 months ago and I'm fully satisfied with the kind of knowledge that they are providing there. A must go for everyone who is interested in sound engineering and up for electronic music production course.</h6>
                        <div class="font-13" align="right">
                            <a href="https://g.co/kgs/b7Lt2P" target="_blank">:Source</a>
                        </div>
                    </div>
                </div>
                <div class="card p-4 mb-4" style="border-radius: 15px;">
                    <div class="card-block">
                        <div class="card-text good-review-score float-left">
                            <img src="https://lh3.googleusercontent.com/a-/ACNPEu-m5lma8B9UQvtnYDM4yYaVn3x8w0eIi0RrwDJ0=w45-h45-p-rp-mo-br100">
                        </div>
                        <div class="card-title ml-4 pl-4">
                            <div class="pl-2">Deepak Singh</div>
                            <div class="pl-2" style="margin-top: -5px;">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                            </div>
                        </div>                        
                    </div>
                    <div class="card-block">
                        <h6 class="card-text font-13">Crypto cipher is the best platform for all music lovers. Here everyone can explore their creativity and achieve their goals. Here every teachers are well qualified for teaching students. I specially thanks to Sumit sir , Satparkesh sir, Sahitya sir And Rio sir for giving me best knowledge. I am very proud feel to be a part of Crypto cipher Academy 🙂</h6>
                        <div class="font-13" align="right">
                            <a href="https://g.co/kgs/nnRaRB" target="_blank">:Source</a>
                        </div>
                    </div>
                </div>
                <div class="card p-4 mb-4" style="border-radius: 15px;">
                    <div class="card-block">
                        <div class="card-text good-review-score float-left">
                            <img src="https://lh3.googleusercontent.com/a/ALm5wu37NldIt0JT9lTmIN-9A4ZJ_ROgxq03o0ButXE-=w45-h45-p-rp-mo-br100">
                        </div>
                        <div class="card-title ml-4 pl-4">
                            <div class="pl-2">Karan Aneja</div>
                            <div class="pl-2" style="margin-top: -5px;">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                            </div>
                        </div>                        
                    </div>
                    <div class="card-block">
                        <h6 class="card-text font-13">If any music hungry person is watching my comment than I want to tell u that CRYPTO CIPHER ACADEMY is the besssssssssssstesstttttt Place for u.... Even 5 stars are less for it... Honestly saying... It's the best place for a music learner.</h6>
                        <div class="font-13" align="right">
                            <a href="https://g.co/kgs/4PW3XT" target="_blank">:Source</a>
                        </div>
                    </div>
                </div>
                <div class="card p-4 mb-4" style="border-radius: 15px;">
                    <div class="card-block">
                        <div class="card-text good-review-score float-left">
                            <img src="https://lh3.googleusercontent.com/a-/ACNPEu-hiGY115uBj-8X_NzRlPekE64H5BwQvi3NKGYGG2k=w45-h45-p-rp-mo-br100">
                        </div>
                        <div class="card-title ml-4 pl-4">
                            <div class="pl-2">Shubham Singh Khati</div>
                            <div class="pl-2" style="margin-top: -5px;">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                            </div>
                        </div>                        
                    </div>
                    <div class="card-block">
                        <h6 class="card-text font-13">The learning curve here is exponential. And all the credit goes to the teachers at the academy who take each student into consideration and give their best to teach us. The course structure is also, designed in a way that'll cover almost everything regarding sound.</h6>
                        <div class="font-13" align="right">
                            <a href="https://g.co/kgs/QME4g6" target="_blank">:Source</a>
                        </div>
                    </div>
                </div>
                <div class="card p-4 mb-4" style="border-radius: 15px;">
                    <div class="card-block">
                        <div class="card-text good-review-score float-left">
                            <img src="https://lh3.googleusercontent.com/a-/ACNPEu_iKdpf9Pz4JTD9R8y02jD8yv5pslRnXkChWkz0MMw=w45-h45-p-rp-mo-ba2-br100">
                        </div>
                        <div class="card-title ml-4 pl-4">
                            <div class="pl-2">Mukul Chaudhary</div>
                            <div class="pl-2" style="margin-top: -5px;">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                            </div>
                        </div>                        
                    </div>
                    <div class="card-block">
                        <h6 class="card-text font-13">Best place in india for proper education of Music production nd sound engineering. If u wanna do something in Production nd sound stream ..then don't be hesitate to get in touch with crypto cipher.<br><br>Awesome Faculty & Ambiance.👌👍</h6>
                        <div class="font-13" align="right">
                            <a href="https://g.co/kgs/VVNtxD" target="_blank">:Source</a>
                        </div>
                    </div>
                </div>
                <div class="card p-4 mb-4" style="border-radius: 15px;">
                    <div class="card-block">
                        <div class="card-text good-review-score float-left">
                            <img src="https://lh3.googleusercontent.com/a-/ACNPEu8ouer7I1yseToQwGBt-58TLYZbSTxBi9WWkJtk3g=w45-h45-p-rp-mo-br100">
                        </div>
                        <div class="card-title ml-4 pl-4">
                            <div class="pl-2">Shivajee Pratap</div>
                            <div class="pl-2" style="margin-top: -5px;">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                            </div>
                        </div>                        
                    </div>
                    <div class="card-block">
                        <h6 class="card-text font-13">Best place in delhi to explore sound & its all aspects. Starting from recording, mixing, mastering to acoustic treatment & wiring you will learn everything here. Trainers are also very friendly.</h6>
                        <div class="font-13" align="right">
                            <a href="https://g.co/kgs/pcN5eQ" target="_blank">:Source</a>
                        </div>
                    </div>
                </div> 
            </div>
            <!-- col 3 -->
            <div class="col-md-4 col-12">
                <!-- card start -->
                <div class="card p-4 mb-4" style="border-radius: 15px;">
                  <div class="card-block">
                    <div class="card-text good-review-score float-left">
                      <img src="https://lh3.googleusercontent.com/a-/ALV-UjU2Tm1__IanLZirJo_v5my9TMD1uYDqQM5iwMSJVYgWqGSTBio2=w45-h45-p-rp-mo-br100">
                    </div>
                    <div class="card-title ml-4 pl-4">
                      <div class="pl-2">Kanha Sharma</div>
                      <div class="pl-2" style="margin-top: -5px;">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                      </div>
                    </div>
                  </div>
                  <div class="card-block">
                    <h6 class="card-text font-13">Hands down the best institute for sound engineering. The flow of the syllabus and the methods of teaching is impeccable and unmatched. Happy to be a part of Crypto Cipher family.</h6>
                    <div class="font-13" align="right">
                      <a href="https://g.co/kgs/sXnZNL9" target="_blank">:Source</a>
                    </div>
                  </div>
                </div>
                <!-- card end -->

                <!-- card start -->
                <div class="card p-4 mb-4" style="border-radius: 15px;">
                  <div class="card-block">
                    <div class="card-text good-review-score float-left">
                      <img src="https://lh3.googleusercontent.com/a-/ALV-UjW-bXpIexd-1dLgjrS443vN-1DsK4B_sWXkvvA_fLaPqgp2NHwp=w45-h45-p-rp-mo-br100">
                    </div>
                    <div class="card-title ml-4 pl-4">
                      <div class="pl-2">Mausumi Kundu</div>
                      <div class="pl-2" style="margin-top: -5px;">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                      </div>
                    </div>
                  </div>
                  <div class="card-block">
                    <h6 class="card-text font-13">Crypto Cypher studio is all about creativity, passion and good music. As an Indian vocalist got chance to do some great experimental works.</h6>
                    <div class="font-13" align="right">
                      <a href="https://g.co/kgs/nyCB9Ad" target="_blank">:Source</a>
                    </div>
                  </div>
                </div>
                <!-- card end -->

                <!-- card start -->
                <div class="card p-4 mb-4" style="border-radius: 15px;">
                  <div class="card-block">
                    <div class="card-text good-review-score float-left">
                      <img src="https://lh3.googleusercontent.com/a-/ALV-UjX0NFgB0GkZL0DQbW4BKCgorShwmLei-TFUiUclUZFLAnXMsQJd=w45-h45-p-rp-mo-br100">
                    </div>
                    <div class="card-title ml-4 pl-4">
                      <div class="pl-2">Ahsan Ali</div>
                      <div class="pl-2" style="margin-top: -5px;">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                      </div>
                    </div>
                  </div>
                  <div class="card-block">
                    <h6 class="card-text font-13">I recently visited at Crypto Cipher Studio. It's a perfect music place to record the music in a very unique way. Keep it up Crypto Cipher.</h6>
                    <div class="font-13" align="right">
                      <a href="https://g.co/kgs/pwWEHjq" target="_blank">:Source</a>
                    </div>
                  </div>
                </div>
                <!-- card end -->
                <!-- card start -->
                <div class="card p-4 mb-4" style="border-radius: 15px;">
                  <div class="card-block">
                    <div class="card-text good-review-score float-left">
                      <img src="https://lh3.googleusercontent.com/a/ACg8ocKe0Ae6a7sKmnLat26RYGzW-F8nazUWMAqsqiKUx9k_CdVyZg=w45-h45-p-rp-mo-br100">
                    </div>
                    <div class="card-title ml-4 pl-4">
                      <div class="pl-2">Aman Narang ( Haryana )</div>
                      <div class="pl-2" style="margin-top: -5px;">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                      </div>
                    </div>
                  </div>
                  <div class="card-block">
                    <h6 class="card-text font-13">Academy is genuinely very good and the teachers are also very nice. They teach in a way which makes even the complicated things easy to understand. If the students are eager to know then the teachers are even more eager to tell. Making notes and regular revision of what is being taught in class is extremely important. Otherwise there is huge bulk of knowledge given in classes and there is high chance that without practice and revision of the same, we won’t be able to remember them all and utilize this opportunity to the maximum potential.</h6>
                    <div class="font-13" align="right">
                      <a href="https://g.co/kgs/guBkrk3" target="_blank">:Source</a>
                    </div>
                  </div>
                </div>
                <!-- card end -->

                <!-- card start -->
                <div class="card p-4 mb-4" style="border-radius: 15px;">
                  <div class="card-block">
                    <div class="card-text good-review-score float-left">
                      <img src="https://lh3.googleusercontent.com/a-/ALV-UjUF_MBhlukyrqaZdJGKMHGdBNOFIqm7DxhEljG2gm06iq0NXbas=w45-h45-p-rp-mo-br100">
                    </div>
                    <div class="card-title ml-4 pl-4">
                      <div class="pl-2">Yash Pahwa</div>
                      <div class="pl-2" style="margin-top: -5px;">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                      </div>
                    </div>
                  </div>
                  <div class="card-block">
                    <h6 class="card-text font-13">I’m just 3 months into the Sound engineering course at CrypoCypher Academy's I've been amazed at how much I'm learning new things every single day. With expert instructors, a comprehensive curriculum, and a collaborative environment, it's been a transformative journey of growth, creativity, and constant discovery.</h6>
                    <div class="font-13" align="right">
                      <a href="https://g.co/kgs/dXP4EsU" target="_blank">:Source</a>
                    </div>
                  </div>
                </div>
                <!-- card end -->

                <!-- card start -->
                <div class="card p-4 mb-4" style="border-radius: 15px;">
                  <div class="card-block">
                    <div class="card-text good-review-score float-left">
                      <img src="https://lh3.googleusercontent.com/a-/ALV-UjWKIgoiz4udRpk65-5e90n7dXVt-nViyxJ-KAHMLGD54KFCfS7Y=w45-h45-p-rp-mo-ba2-br100">
                    </div>
                    <div class="card-title ml-4 pl-4">
                      <div class="pl-2">Prarushi Verma ( Jaipur )</div>
                      <div class="pl-2" style="margin-top: -5px;">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                        <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px" repeat="5">
                      </div>
                    </div>
                  </div>
                  <div class="card-block">
                    <h6 class="card-text font-13">I would not take any names of other institutes but students have left other academies and came to this one because there they didn't find any education taking place. There's a difference between an institution and a business organization and crypto cipher is purely intended to provide the best music production and sound engineering knowledge. All three teachers are highly professional with great amount of expertise, very kind enough to acknowledge all sorts of problems. I am an absolute beginner in this field but they have always been there to help me out and answer all my questions 10 times. HIGHLY RECOMMENDED!!</h6>
                    <div class="font-13" align="right">
                      <a href="https://g.co/kgs/mrUrju2" target="_blank">:Source</a>
                    </div>
                  </div>
                </div>
                <!-- card end -->
                <div class="card p-4 mb-4" style="border-radius: 15px;">
                    <div class="card-block">
                        <div class="card-text good-review-score float-left">
                            <img src="https://lh3.googleusercontent.com/a/ALm5wu3J6kKpsWMNG574vofm9tqkgG5G1P_G74q92ObfgQ=w45-h45-p-rp-mo-br100">
                        </div>
                        <div class="card-title ml-4 pl-4">
                            <div class="pl-2">Diljeet Singh</div>
                            <div class="pl-2" style="margin-top: -5px;">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                            </div>
                        </div>                        
                    </div>
                    <div class="card-block">
                        <h6 class="card-text font-13">I joined Crypto Cipher Academy in August 2018 for Sound Engineering Course. My experience with the Acadamy is an exceptional one, the faculty here is very helping and does a genuine effort to explain each and every concept in detail and encourage us to ask questions until the concept is cleared.<br><br>They encourage us to be creative and experimental, they teach us to know and understand sound visually and audibly. This opens so many possibilities for using sound of ertistically and expressively.<br><br>In my opinion, this Acadamy is the best place for learning sound, and i would highly recommend Crypto Cipher if you are interested and want to start a career in the industry.</h6>
                        <div class="font-13" align="right">
                            <a href="https://g.co/kgs/PgBbAv" target="_blank">:Source</a>
                        </div>
                    </div>
                </div>
                <div class="card p-4 mb-4" style="border-radius: 15px;">
                    <div class="card-block">
                        <div class="card-text good-review-score float-left">
                            <img src="https://lh3.googleusercontent.com/a-/ACNPEu9-4RVZOd7aeFelU2h6RqAcPgSUb1UvGcfj9Kxh=w45-h45-p-rp-mo-br100">
                        </div>
                        <div class="card-title ml-4 pl-4">
                            <div class="pl-2">Sagar bankoti</div>
                            <div class="pl-2" style="margin-top: -5px;">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                            </div>
                        </div>                        
                    </div>
                    <div class="card-block">
                        <h6 class="card-text font-13">This is one of the best institute for sound or music u can find in Delhi , the explanation the staff the comfortness , the way of teaching everything is on top 🔥</h6>
                        <div class="font-13" align="right">
                            <a href="https://g.co/kgs/5dB2zk" target="_blank">:Source</a>
                        </div>
                    </div>
                </div>
                <div class="card p-4 mb-4" style="border-radius: 15px;">
                    <div class="card-block">
                        <div class="card-text good-review-score float-left">
                            <img src="https://lh3.googleusercontent.com/a-/ACNPEu-tlgOo76qvi__P0HAgphn4RoltMmNT1VRojb2RBA=w45-h45-p-rp-mo-br100">
                        </div>
                        <div class="card-title ml-4 pl-4">
                            <div class="pl-2">Scaria Jacob</div>
                            <div class="pl-2" style="margin-top: -5px;">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                            </div>
                        </div>                        
                    </div>
                    <div class="card-block">
                        <h6 class="card-text font-13">I got what I was looking for because of an experience I will never forget, and now I am proud to say that I studied cryptocipher, I now work as a music programmer at U S A texas,<br><br>Thank you crypto cipher</h6>
                        <div class="font-13" align="right">
                            <a href="https://g.co/kgs/fhe4MR" target="_blank">:Source</a>
                        </div>
                    </div>
                </div>
                <div class="card p-4 mb-4" style="border-radius: 15px;">
                    <div class="card-block">
                        <div class="card-text good-review-score float-left">
                            <img src="https://lh3.googleusercontent.com/a-/ACNPEu8xCRWe6l2G_2N6gVxGoawF8FdrTFf_tTZMrBQaNJ0=w45-h45-p-rp-mo-br100">
                        </div>
                        <div class="card-title ml-4 pl-4">
                            <div class="pl-2">ketox</div>
                            <div class="pl-2" style="margin-top: -5px;">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                            </div>
                        </div>                        
                    </div>
                    <div class="card-block">
                        <h6 class="card-text font-13">I love this acadmy. If anyone wants to make his career in the field of sound and music production , then don't think so much and join the academy.. The teachers here have more knowledge than the limits. I am having great time in there.</h6>
                        <div class="font-13" align="right">
                            <a href="https://g.co/kgs/7jB3Jb" target="_blank">:Source</a>
                        </div>
                    </div>
                </div>
                <div class="card p-4 mb-4" style="border-radius: 15px;">
                    <div class="card-block">
                        <div class="card-text good-review-score float-left">
                            <img src="https://lh3.googleusercontent.com/a-/ACNPEu8z-8Du-XIHnmQeKIczMWUY9fK1MVooc7eVEnKYsg=w45-h45-p-rp-mo-br100">
                        </div>
                        <div class="card-title ml-4 pl-4">
                            <div class="pl-2">Manmohit Shakywar</div>
                            <div class="pl-2" style="margin-top: -5px;">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                                <img src="https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png" width="15px">
                            </div>
                        </div>                        
                    </div>
                    <div class="card-block">
                        <h6 class="card-text font-13">Cypto Cipher Academy is a unique institute, where we can learn Music Production and Sound Engineering based on modern aspects of Music Industry. All modules are systematically based on basic knowledge of Music theory, DAW, Sound and live applications of musical skills in various projects. All faculties are with expertise in their subjects and have personal approach to teach and motivate each student.<br><br>To start your musical journey, just join Crypto Cipher Academy.</h6>
                        <div class="font-13" align="right">
                            <a href="https://g.co/kgs/aeVGjj" target="_blank">:Source</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('script')
<script src="https://apps.elfsight.com/p/platform.js" defer></script>
@endsection
