<div class="top-header-section py-3 px-0 py-md-3 px-md-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-4 col-md-8 col-lg-8">
                <div class="media align-items-center d-inline-block mr-2 mr-md-4 mr-lg-5">
                    <a href="tel:+31685000865" class="">
                        <span class="lnr lnr-phone-handset text-white display-6"></span>
                        <span class="media-body d-none d-md-inline-block ml-2 text-white">
                        +31 685 000 865
                        </span>
                    </a>
                </div>
                <div class="media align-items-center d-inline-block">
                    <a href="mailto:info@sportees.nl" class="">
                        <span class="lnr lnr-envelope text-white display-6"></span>
                        <span class="media-body d-none d-md-inline-block ml-2 text-white">
                        info@sportees.nl
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-8 col-md-4 col-lg-4">
                <div class="row align-items-center">
                    <div class="col-6 col-sm-6 text-right">
                        
                    </div>
                    <div class="col-3 col-sm-3 text-right mt-2">
                        @if(Auth::check())
                        <a href="{{route('cart')}}">
                            <span class="lnr lnr-cart text-white" style="font-size: 25px; margin-top: 10px"></span>
                            <span class="bg-theme d-inline-block text-white float-right px-2 py-0 radius-5" style="font-size: 10px" id="cartcount">0</span>
                        </a>
                        @endif
                    </div>
                    <div class="col-3 col-sm-3 text-right">
                        <div class="dropdown">
                            <a class="inr-toggle-arrow dropdown-toggle text-white" href="javascript:;" data-toggle="dropdown">
                                <!-- <img class="img img-fluid" src="assets/img/{{\App::getLocale()}}.png" alt="Flag Image" /> -->
                                <span class="pl-2">{{\App::getLocale()}}</span>
                            </a>
                            <div class="dropdown-menu l-auto r-0">
                                @foreach (Config::get('languages') as $lang => $language)
                                    @if ($lang != App::getLocale())
                                        <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}">
                                            <!-- <img class="img img-fluid" src="assets/img/{{$lang}}.png" alt="Flag Image" />  -->
                                            {{$lang}}</a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>