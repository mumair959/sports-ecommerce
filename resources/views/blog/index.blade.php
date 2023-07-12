@extends('layouts.app_layout')

@section('content')

@include('layouts.small_banner',['title' => __('site.blogs')])

<section class="blog-wrapper py-5 ">
    <div class="container">
        <div class="row">
            @foreach($blogs as $blog)
            <div class="col-xl-4 col-md-6 insights mx-0 mb-md-0">
                <div class="card shadow border mx-0">
                    <div class="card-image product-img-grid">
                        <img class="card-img-top product-img-elem" src="{{$blog->image_url}}" alt="Card image">
                    </div>
                    <div class="card-body p-3">
                        <h4 class="card-title mb-0"><a href="{{route('blog-details',['id' => $blog->id])}}" class="text-grey">{{$blog->title}}</a></h4>
                        <div class="card-section-1 pt-3">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="media align-items-center">
                                        <a href="javascript:void(0)" class="text-link d-inline-block">
                                            <img src="{{$blog->author->profile_image}}" alt="John Doe" class="mr-3 user-avatar-50 rounded-circle d-inline-block">
                                            <div class="media-body d-inline-block">
                                                <p><strong>{{$blog->author->name}}</strong></p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-text">
                            <div class="card-section-1 py-3">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="pdt-description">
                                            <p>{{$blog->details}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-0">
                            <div class="card-section-2">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="insight-posted-date">
                                            <span class="lnr lnr-clock text-theme pr-2"></span>
                                            <span>{{Carbon\Carbon::parse($blog->created_at)->format('d M Y')}}</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="insight-share text-right">
                                            <a href="{{route('blog-details',['id' => $blog->id])}}">
                                                <span>&nbsp;View Detail</span>
                                                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
    
@endsection