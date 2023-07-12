<footer>
   <div class="top-footer py-5">
<div class="container">
<div class="row align-items-center">
<div class="col-md-3 text-left xs-text-center">
<img class="img img-fluid" src="assets/img/logo-footer.png" alt="Footer Logo" />
</div>
<div class="col-md-6 text-center">
<ul class="my-4 my-md-0">
<li class="list-inline-item"><img class="img img-fluid" src="assets/img/pay1.png" alt="Payment Method" /></li>
<li class="list-inline-item"><img class="img img-fluid" src="assets/img/pay2.png" alt="Payment Method" /></li>
<li class="list-inline-item"><img class="img img-fluid" src="assets/img/pay3.png" alt="Payment Method" /></li>
<li class="list-inline-item"><img class="img img-fluid" src="assets/img/pay4.png" alt="Payment Method" /></li>
<li class="list-inline-item"><img class="img img-fluid mt-2 mt-sm-0" src="assets/img/pay5.png" alt="Payment Method" /></li>
</ul>
</div>
<div class="col-md-3 text-right">
<div class="social-widget">
<ul class="lh-0 xs-text-center">
<li class="list-inline-item"><a class="d-inline-block" href="javascript:;"><i class="fa fa-facebook"></i></a></li>
<li class="list-inline-item"><a class="d-inline-block" href="javascript:;"><i class="fa fa-twitter"></i></a></li>
<li class="list-inline-item"><a class="d-inline-block" href="javascript:;"><i class="fa fa-google-plus"></i></a></li>
</ul>
</div>
</div>
</div>
</div>
</div>

    <div class="middle-footer py-6">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-md-5 mb-lg-0">
                    <div class="company-info-widget mb-4 mb-md-0">
                        <h5 class="text-theme">{{__('site.about_us')}}</h5>
                        <p class="pt-4">{{__('site.about_us_footer_text')}}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-md-5 mb-lg-0">
                    <div class="mb-4 mb-md-0">
                        <h5 class="text-theme">Sportees</h5>
                        <ul class="pt-4 footer-list-style">
                            <li><a class="text-footer" href="{{route('about')}}"><i class="lnr lnr-chevron-right mr-2"></i>{{__('site.profile')}}</a></li>
                            <li><a class="text-footer" href="{{route('about')}}"><i class="lnr lnr-chevron-right mr-2"></i>{{__('site.our_partners')}}</a></li>
                            <li><a class="text-footer" href="{{route('privacy-policy')}}"><i class="lnr lnr-chevron-right mr-2"></i>{{__('site.privacy_policy')}}</a></li>
                            <li><a class="text-footer" href="{{route('contact-us')}}"><i class="lnr lnr-chevron-right mr-2"></i>{{__('site.help_support')}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2 mb-lg-0">
                    <div class="mb-4 mb-md-0">
                        <h5 class="text-theme">{{__('site.sellers')}}</h5>
                        <ul class="pt-4 footer-list-style">
                            @if(!Auth::check())
                            <li><a class="text-footer" href="{{route('login')}}"><i class="lnr lnr-chevron-right mr-2"></i>{{__('site.login')}}/{{__('site.register')}}</a></li>
                            @endif
                            <li><a class="text-footer" href="{{route('sell')}}"><i class="lnr lnr-chevron-right mr-2"></i>{{__('site.add_products')}}</a></li>
                            <li><a class="text-footer" href="{{route('terms-and-conditions')}}"><i class="lnr lnr-chevron-right mr-2"></i>{{__('site.terms_of_use')}}</a></li>
                            <li><a class="text-footer" href="{{route('faq')}}"><i class="lnr lnr-chevron-right mr-2"></i>{{__('site.faq')}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2 mb-lg-0">
                    <div class="mb-4 mb-md-0">
                        <h5 class="text-theme">Buyers</h5>
                        <ul class="pt-4 footer-list-style">
                            @if(!Auth::check())
                            <li><a class="text-footer" href="{{route('login')}}"><i class="lnr lnr-chevron-right mr-2"></i>{{__('site.login')}}/{{__('site.register')}}</a></li>
                            @endif
                            <li><a class="text-footer" href="{{route('buy')}}"><i class="lnr lnr-chevron-right mr-2"></i>{{__('site.find_products')}}</a></li>
                            <li><a class="text-footer" href="{{route('terms-and-conditions')}}"><i class="lnr lnr-chevron-right mr-2"></i>{{__('site.terms_of_use')}}</a></li>
                            <li><a class="text-footer" href="{{route('faq')}}"><i class="lnr lnr-chevron-right mr-2"></i>{{__('site.faq')}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="bottom-footer text-center py-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p>{{__('site.copyrights')}} 2022-2023 @ SPORTEES. {{__('site.all_rights_reserved')}}</p>
                </div>
            </div>
        </div>
    </div>
</footer>