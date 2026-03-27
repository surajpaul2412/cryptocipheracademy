@extends('layouts.frontend.app')
@section('metas')
<title>Downloads | Crypto Cipher® ( Academy,India)</title>
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
                <h4 class="font-black text-black font-35 marT-10">Download Files & Folder</h4>
            </div>
            <!-- content -->
            @if($downloads->count())
            <div class="row px-3 pb-1" style="margin-bottom: -4px;">
                @foreach($downloads as $index => $row)
                <div class="col-md-6 col-12 my-3">
                    <div class="slider-header p-3 w-100 d-flex align-items-center">
                        <div class="w-80">
                            <h6 class="text-black bold uppercase font-regular font-13">{{$row->name}}</h6>
                            <div class="text-black font-regular font-13">
                                {!! $row->content !!}
                                <!-- {!! \Illuminate\Support\Str::limit($row->content, 75, $end='...') !!} -->
                            </div>
                        </div>
                        <div class="w-20">
                            <div class="download-square">
                                <a class="content" align="center" data-toggle="modal" data-target="#myModal{{$index+1}}">
                                    <img src="{{ asset('assets/frontend/img/download.svg') }}" alt="download"  style="position: relative;top: 50%;transform: translateY(-50%);">    
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            @endif
        </section>
    </div>

    <!-- modal -->
    @foreach($downloads as $index => $row)
    <div class="modal fade" id="myModal{{$index+1}}" role="dialog" style="z-index: 999999;">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h6 class="font-regular font-14 text-dark text-justify" style="transform: initial;">
                        {!!$row->file!!}
                    </h6>
                    <!-- <div>
                        @if($row->path)
                        <span class="font-weight-bold">Download Zip:</span>
                        <a href="{{asset('storage/downloads')}}/{{$row->path}}" class="font-14 font-normal" download>cryptocipher.downloads</a>
                        @endif
                    </div> -->
                </div>
                <div class="modal-footer justify-content-center">
                    <a href="{{route('download.show',$row->id)}}" target="_blank" class="btn btn-info text-capitalize rounded-pill">Get Download Link</a>
                    <button type="button" class="btn btn-danger text-capitalize rounded-pill" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection

@section('script')
@endsection
