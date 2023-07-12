<section class="video-wrapper pt-10 pb-4 pb-md-4 pb-lg-5">
    <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
        <source src="{{asset('assets/videos/sports.mp4')}}" type="video/mp4">
    </video>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="video-caption-blk position-relative py-10">
                    <div class="video-caption valign text-white text-center w-100 z-index2">
                        <h1 class="px-2 px-sm-0 d-inline-block"><span class="d-block text-white px-4 mt-2"> {{__('site.buy')}} - {{__('site.sell')}} - {{__('site.rent')}} - {{__('site.exchange')}} </span></h1>
                        <h4 class="my-4 my-md-5 px-4 px-md-5 px-sm-0">{{__('site.main_banner_caption')}}</h4>
                        <div class="row">
                            <div class="col-12">
                                @if(!Auth::check())
                                <div class="btn-blk">
                                    <a class="d-inline-block btn btn-theme radius-5 px-4 py-3" href="{{route('register')}}">{{__('site.register_now')}}</a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="section-bottom-wrapper pt-8 position-relative b-0 w-100 pb-0 text-center d-none d-md-block z-index2">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="box-blk text-white">
                        <span class="lnr lnr-users font-lg d-inline-block mb-3"></span>
                        <h5 class="font-bold">10+ {{__('site.partners')}}</h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box-blk text-white">
                        <span class="lnr lnr-bicycle font-lg d-inline-block mb-3"></span>
                        <h5 class="font-bold">20+ {{__('site.brands')}}</h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box-blk text-white">
                        <span class="lnr lnr-cart font-lg d-inline-block mb-3"></span>
                        <h5 class="font-bold">50+ {{__('site.products')}}</h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box-blk text-white">
                        <span class="lnr lnr-smile font-lg d-inline-block mb-3"></span>
                        <h5 class="font-bold">500+ {{__('site.happy_customers')}}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>