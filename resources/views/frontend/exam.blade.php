@extends('layouts.frontend.app')
@section('metas')
<title>Music Production & Sound Engineering Certification | Crypto Cipher® ( Academy,India)</title>
<meta name="description" content="Audio Engineering Diploma & Music Production course syllabus, passing credits for diploma certificate.">
@endsection

@section('css')
<style>
  .table-striped tbody tr:nth-of-type(odd){
    background-color: transparent;
  }
  .table-striped tbody tr:nth-of-type(even){
    background-color: #E5E5ED;
  }
  .bg-light-grey{
    background-color: #E5E5ED;
  }
  th{
    font-family: 'Roboto-Bold';
    font-size: 13px;
  }
  td{
    font-family: 'Roboto-Bold';
    font-size: 13px !important;
    color: #6D7178;
    border-right: 1px solid #fff;
  }
  th{
    border-right: 1px solid #fff;
  }
  .table thead th{
    padding-top: 18px !important;
  }
  @media screen and (max-width: 900px) {
    td{
      font-size: 9px !important;
    }
  }
</style>
@endsection

@section('content')
<div class="bg-theme1 main-inner">
    <section class="container slider-header">
        <!-- title -->
        <div class="px-3 pt-4 media-pt-0">
            <h1 class="font-regular text-grey2 pl-2 pb-0 font-13 inner-title uppercase">Exam structure & certification</h1>
            <h4 class="font-black text-black font-35 marT-10">Exam Details</h4>
        </div>
        <!-- content -->
        <div class="row px-3 pb-4" style="margin-bottom: -18px;">
            <div class="col-md-12 my-3">
              @if($exam->count())
                <div class="slider-header py-4 px-3 media-px-0 media-py-0">
                    <div class="table-responsive px-3 media-px-0">
                      <table class="table table-striped">
                        <thead>
                          <tr class="uppercase bold font-regular bg-light-grey">
                            <th class="bold">Modules</th>
                            <th class="bold">Exam Structure</th>
                            <th class="bold">Full Marks</th>
                            <th class="bold">Credit Division</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($exam as $row)
                          <tr class="bold font-regular">
                            <td>{!! $row->module !!}</td>
                            <td>{!! $row->structure !!}</td>
                            <td>{!! $row->marks !!}</td>
                            <td>{!! $row->credits !!}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
              @endif
            </div>
            <div class="col-md-12 px-5 pt-3">
                <h6 class="font-medium font-13 text-black">Total Credits - 64 Credits</h6>
                <h6 class="font-medium font-13 text-black">Credits Required for Certification - 40 Credits (minimum)</h6>
                <h6 class="font-medium font-13 text-black">Credits Required for Enrolment into Crypto Cipher Internship Program - 50 Credits (minimum)</h6>
                <h6 class="font-regular font-13 text-grey2">* The end credits of a student are calculated on the basis of their credit score throughout the module. Credits acquired in each module will be added up for the total credit score of a student. </h6>
            </div>
        </div>
    </section>
</div>
@endsection

@section('script')
@endsection