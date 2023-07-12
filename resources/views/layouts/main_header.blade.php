<div class="main-header-section shadow-sm">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="main-menu menu-section w-100 d-inline-block d-md-block">
                    <div id="offcanvas_menu">
                        <span class="lnr lnr-cross float-left display-6 position-absolute t-1 l-1 text-white" id="close_navSidebar"></span>
                        <div class="user-info align-center bg-theme text-center">
                            @if(Auth::check())
                            <a href="javascript:;" class="d-block menu-style text-white">
                                <div class="user-avatar user-avatar-50 d-inline-block mr-3">
                                    <img src="{{Auth::user()->profile_image}}" alt="user avatar" class="rounded-circle">
                                </div>
                                <div class="user-info d-inline-block align-middle">
                                    <ul>
                                        <li>{{Auth::user()->name}}</li>
                                    </ul>
                                </div>
                            </a>
                            @endif
                        </div>
                        <div class="user-menu-items p-3 m-0 text-left">
                            @if(Auth::check() && Auth::user()->user_type == 'admin')
                            <a class="d-block pb-3" href="{{route('dashboard')}}">
                                <span class="lnr lnr-pie-chart mr-3"></span>
                                <span class="text-truncate">{{__('site.dashboard')}}</span>
                            </a>
                            @endif

                            @if(Auth::check())
                            <a class="d-block pb-3" href="{{route('cart')}}">
                                <span class="lnr lnr-cart mr-3"></span>
                                <span class="text-truncate">{{__('site.cart')}}</span>
                                <span class="bg-theme d-inline-block text-white float-right px-3 py-0 radius-5" id="cartcount">0</span>
                            </a>
                            <a class="d-block p-0" href="{{route('dashboard')}}">
                                <span class="lnr lnr-user mr-3"></span>
                                <span class="text-truncate">Edit Profile</span>
                            </a>
                            <a class="d-block p-0" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span class="lnr lnr-power-switch mr-3"></span>
                                <span class="text-truncate">{{__('site.logout')}}</span>
                            </a>
                            @endif
                        </div>
                    </div>
                    <nav class="navbar navbar-expand-lg p-0">
                        <div class="logo my-3 my-md-0">
                            <a class="navbar-brand" href="{{route('home')}}">
                                <img src="assets/img/sportees_logo1.png" alt="logo image" class="img-fluid">
                            </a>
                        </div>
                        <button class="navbar-toggler d-block d-md-none pr-0 ml-auto mr-3 collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar bg-theme top-bar"></span>
                            <span class="icon-bar bg-theme middle-bar"></span>
                            <span class="icon-bar bg-theme bottom-bar"></span>
                        </button>
                        <div class="collapse navbar-collapse menu-items-position d-md-block" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto text-uppercase">
                                <li class="nav-item active">
                                    <a class="nav-link pl-md-0" href="{{route('home')}}">{{__('site.home')}} <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('buy')}}">{{__('site.buy')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('sell')}}">{{__('site.sell')}}</a>
                                </li>
                                <li class="nav-item">
                                   <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="{{route('home')}}" data-toggle="dropdown">{{__('site.rent')}}</a>
                                    <div class="dropdown-menu r-0" id="custom-scroll">
                                        <ul>
                                            <li class="pb-3"><a href="{{route('find-rent-items')}}" class=""> - Find for Rent </a></li>
                                            <li class="pb-3"><a href="{{route('add-rent-items')}}" class=""> - Add to Rent</a></li> 
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="javascript:;" data-toggle="dropdown">{{__('site.exchange')}}</a>
                                    <div class="dropdown-menu r-0" id="custom-scroll">
                                        <ul>
                                            <li class="pb-3"><a href="{{route('find-exchange-items')}}" class=""> - Find for Exchange</a></li>
                                            <li class="pb-3"><a href="{{route('add-exchange-items')}}" class=""> - Add to Exchange</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('faq')}}">{{__('site.faq')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('blog')}}">{{__('site.blog')}}</a>
                                </li>
                            </ul>

                        @if(!Auth::check())
                        <div class="cta-btn text-right d-none d-md-inline-block">
                            <a href="{{route('login')}}" class="btn-outline-theme px-4 radius-5 py-3"><span class="lnr lnr-user pr-2"></span>{{__('site.login')}}</a>
                        </div>
                        @else
                        <div class="user-info align-right dropdown d-none d-md-inline-block">
                            <a href="javascript:;" data-toggle="dropdown" class="d-block menu-style text-theme-secondary dropdown-toggle cart-btn">
                                <div class="user-avatar user-avatar-50 d-inline-block">
                                    <img src="{{Auth::user()->profile_image}}" alt="user avatar" class="rounded-circle">
                                </div>
                            </a>

                            <div class="dropdown-menu custom-minwidth notification-dropdown-menu shadow-lg border-0 p-3 m-0 dropdown-menu-right">
                                @if(Auth::check() && Auth::user()->user_type == 'admin')
                                <a class="dropdown-item px-0 pt-0 pb-3" href="{{route('dashboard')}}">
                                    <span class="lnr lnr-pie-chart mr-3"></span>
                                    <span class="text-truncate">{{__('site.dashboard')}}</span>
                                </a>
                                @endif
                                <a class="dropdown-item px-0 pt-0 pb-3" href="{{route('cart')}}">
                                    <span class="lnr lnr-cart mr-3"></span>
                                    <span class="text-truncate">{{__('site.cart')}}</span>
                                    <span class="bg-theme d-inline-block text-white float-right px-3 py-0 radius-5" id="cartcount">0</span>
                                </a>
                                <a class="dropdown-item px-0 pt-0 pb-3" href="{{route('profile')}}">
                                    <span class="lnr lnr-user mr-3"></span>
                                    <span class="text-truncate">Edit Profile</span>
                                </a>
                                <a class="dropdown-item p-0" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span class="lnr lnr-power-switch mr-3"></span>
                                    <span class="text-truncate">{{__('site.logout')}}</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        @endif

                        </div>
                        <div class="d-inline-block align-middle d-md-none">
                            @if(Auth::check())
                            <a href="javascript:;" class="cart-btn">
                                <span class="lnr lnr-user d-block display-5" id="open_navSidebar"></span>
                            </a>
                            @else
                            <a href="{{route('login')}}" class="cart-btn">
                                <span class="lnr lnr-user d-block display-5"></span>
                            </a>
                            @endif
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>