@extends('layouts.app_layout')

@section('content')

@include('layouts.small_banner',['title' => __('site.blog_details')])

<section class="user-profile-wrapper py-5 ">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 order-lg-8">
            
            <div class="card border shadow bg-white post-blog mb-4 mb-lg-0">
                <div class="pdt-item-info">
                    <div class="pdt-item-nav p-4">
                        <h4>{{__('site.latest_blogs')}}</h4>
                    </div>
                    <hr>
                    <div class="tab-content">
                        <div class="tab-content-wrapper">
                            @foreach($latest_blogs as $latest)
                            <a href="{{route('blog-details',['id' => $latest->id])}}">
                                <div class="media align-items-center px-4">
                                    <div class="usr">
                                    <img src="{{$latest->image_url}}" alt="blog image">
                                    </div>
                                    <div class="pl-3 media-body">
                                    <p class="mb-2 custom-truncate text-link">{{$latest->title}}</p>
                                    <div class="insight-posted-date">
                                        <span class="lnr lnr-clock text-grey"></span>
                                        <span class="text-grey">&nbsp;{{Carbon\Carbon::parse($latest->created_at)->format('d M Y')}}</span>
                                    </div>
                                    </div>
                                </div>
                            </a>
                            <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-lg-8 order-lg-4">
                <div class="card mx-0 border shadow mb-4 mb-md-0">
                    <div class="card-image">
                        <img class="card-img-top" src="{{$blog->image_url}}" alt="Card image">
                    </div>
                    <div class="card-body p-4">
                        <div class="card-title mb-0">
                            <h3 class="mb-3">{{$blog->title}}</h3>
                            <div class="card-section-2">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="insight-posted-date">
                                            <span class="lnr lnr-clock text-theme"></span>
                                            <span>&nbsp;{{Carbon\Carbon::parse($blog->created_at)->format('d M Y')}}</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    <hr>
                    <div class="card-text">
                        <div class="card-section-3">
                            <div class="row">
                                <div class="col-12">
                                    <div class="pdt-description">
                                        <p>{{$blog->details}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    
@endsection