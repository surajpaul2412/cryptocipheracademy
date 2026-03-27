@extends('layouts.frontend.app')
@section('metas')
<title>{{$download->name}} | Crypto Cipher® ( Academy,India)</title>
<meta name="description" content="Logic Pro X & Ableton Live free projects, Sample packs, Free Kontakt Instruments, Loops and Synth Massive & Serum Presets.">
@endsection

@section('css')
@endsection

@section('content')
    <div class="bg-theme1 main-inner">
        <section class="container slider-header">
            <!-- title -->
            <div class="px-3 pt-4 media-pt-0">
                <h1 class="font-regular text-grey2 pl-2 pb-0 font-13 inner-title">DOWNLOADS</h1>
                <h4 class="font-black text-black font-35 marT-10">{{$download->name}}</h4>
            </div>
            @if(isset($success))
                <div class="col-md-12 col-12">
                    <div class="text-success bold font-14 pt-3">
                        {{ $success }}
                    </div>
                </div>
            @endif
            <!-- content -->
            <div class="row px-3 pb-1" style="margin-bottom: -4px;">
                <div class="col-md-12 my-3">
                    <div class="slider-header p-3 w-100 d-flex">
                        <div class="">
                            <h6 class="text-black bold uppercase font-regular font-13">{{$download->name}}</h6>
                            <div class="text-black font-regular font-13">{!! $download->content !!}</div>
                            <p>
                            	{!!$download->file!!}
                            </p>

                            <form method="POST" class="px-5" action="{{route('download.store')}}" enctype="multipart/form-data">
                                @csrf
                                <h4 align="center" class="pt-5 pb-3 font-weight-bold">Download From Here :</h4>
                                <input type="hidden" name="id" value="{{$download->id}}" required>
                                <div class="md-form mt-0 w-100">
                                    <input type="text" class="form-control" name="name" required>
                                    <label>Your Name <sup class="text-danger">*</sup></label>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- phone number -->
                                <div class="md-form mt-0 w-100">
                                    <input type="number" class="form-control" name="phone">
                                    <label>Phone Number</label>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- email -->
                                <div class="md-form mt-0 w-100">
                                    <input type="email" class="form-control" name="email" required>
                                    <label>Email ID <sup class="text-danger">*</sup></label>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="submit" class="print btn button1 btn-success d-block mx-auto">Download Now</button>   
                            </form>

                            <!-- <div>
                            	@if($download->path)
                            	<span class="font-weight-bold">Download Zip:</span>
                            	<a href="{{asset('storage/downloads')}}/{{$download->path}}" class="font-14 font-normal" download>cryptocipher.downloads</a>
                            	@endif
                            </div> -->

                            <div class="py-4">
                            	<span class="font-weight-bold">Share via:</span>
                            	<a href="https://www.facebook.com/sharer/sharer.php?u=#@php echo url()->current(); @endphp" target="_blank">
                                    <img src="{{ asset('assets/frontend/img/facebook-sq.png') }}" width="30px" alt="facebook share">
                                </a>
                            	<a href="https://api.whatsapp.com/send?text=@php echo url()->current(); @endphp" data-action="share/whatsapp/share">
                                    <img src="{{ asset('assets/frontend/img/whatsapp-sq.png') }}" width="31px" alt="whatsapp share">
                                </a>
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
