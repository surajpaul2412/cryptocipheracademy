@section('title')
<title>404 Page | Crypto Cipher ®</title>
@endsection

<div class="bg-theme1 main-inner">
    <section class="container slider-header">
        <!-- title -->
        <div class="px-3 pt-4 media-pt-0">
            <h6 class="font-regular text-grey2 pl-2 pb-0 font-13 inner-title uppercase"></h6>
            <h4 class="font-black text-black font-35 marT-10">404 | Page Not Found</h4>
        </div>
        <!-- content -->
        <div class="row px-3">
            <div class="col-md-12 mb-3 mt-1">
                <div class="font-regular text-grey2 font-13" align="center">
                    <img src="{{asset('assets/frontend/img/404.png')}}" class="mx-auto d-block" width="50%">
                </div>
                <div class="font-regular text-grey2 font-13" align="left">
                    <h6 class="font-black text-black font-25 marT-10">Quick Links :</h6>
                    <h5 class="font-regular"><a href="{{url('/')}}" class="text-grey2"> <i class="fa fa-angle-right text-green"></i> Home Page</a></h5>
                    <h5 class="font-regular"><a href="{{url('about_us')}}" class="text-grey2"> <i class="fa fa-angle-right text-green"></i> About Us</a></h5>
                    <h5 class="font-regular"><a href="{{url('contact_us')}}" class="text-grey2"> <i class="fa fa-angle-right text-green"></i> Contact Us</a></h5>
                </div>
            </div>
        </div>
    </section>
</div>

