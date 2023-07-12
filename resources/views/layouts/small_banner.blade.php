<section class="slider-wrapper py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="inner-banner-heading py-0 py-md-3 py-lg-5">
                    <h1 class="text-white">{{$title}}</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="breadcrumb-wrapper bg-theme py-2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="custom-breadcrumb">
                    <ol class="breadcrumb no-bg-color p-0 m-0">
                        <li class="breadcrumb-item d-inline-block"><a href="{{route('home')}}" class="text-theme-secondary">{{__('site.home')}}</a></li>
                        <li class="breadcrumb-item d-inline-block active">{{$title}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>