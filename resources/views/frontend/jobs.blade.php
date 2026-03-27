@extends('layouts.frontend.app')
@section('metas')
<title>Sound Engineering & Music Production Jobs | Crypto Cipher® ( Academy,India)</title>
<meta name="description" content="Apply for sound engineering and music production internships program. Jobs,Salary and work ethics details. Sound Engineers,Music Producers,Live Sound Engineers,Faculty and Managers with musical background.">
@endsection

@section('css')
<style>
    #search{
        max-width: 600px;
        margin: 0px auto;
        padding: 25px 20px;
    }
</style>
@endsection


@section('content')
<div class="bg-theme1 main-inner">
    <section class="container slider-header">
        <!-- title -->
        <div class="px-3 pt-4 media-pt-0">
            <h1 class="font-regular text-grey2 pl-2 pb-0 font-13 inner-title uppercase">Vacancies</h1>
            <h4 class="font-black text-black font-35 marT-10">Crypto Cipher Opportunity</h4>
        </div>
        <!-- content -->
        <div class="row px-3 pb-1">
            @if($jobs->count())
            <div class="col-md-12 my-3">
                <div class="slider-header pt-4 pb-3 px-3">
                    <h4 class="font-bold text-black mb-3" align="center">Find your perfect role.</h4>
                    <input type="text" class="form-control" placeholder="Search job here ..." id="search">

                    @foreach($jobs as $index => $row)
                    <div class="pt-3 px-3 jobs slider-header pb-4 mt-3">
                        <h4 class="font-bold text-green" align="left">{{$index+1}}. {{$row->title}}</h4>
                        <h6 class="font-regular text-black" align="left"><b class="bold">Location :</b> New Delhi</h6>
                        <b class="bold">Job Description :</b>
                        <div>
                            {!! $row->description !!}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @else
            <div class="col-md-12 my-3" style="height: 58vh;">
                <div class="slider-header pt-4 pb-3 px-3">
                    <h2 class="font-regular text-black" align="center">Sorry ! No Vacancy now</h2>
                </div>
            </div>
            @endif
        </div>
    </section>
</div>
@endsection


@section('script')
<script>
$("#search").on("keyup", function() {
  var value = $(this).val().toLowerCase();
  $(".jobs").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
  });
});
</script>
@endsection