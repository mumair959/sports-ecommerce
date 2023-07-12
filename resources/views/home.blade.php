@extends('layouts.app_layout')

@section('content')
    @include('layouts.main_banner')

    <section class="pdt-cat-wrapper py-6">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="pdt-cat-blk text-center">         
                        <div class="row">
                            <div class="col-12">
                                <div class="pdt-cat-grid">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-lg-4">
                                            <div class="border-theme radius-1 p-4 mb-6">
                                                <a href="javascript:void(0)">
                                                    <div class="icon-blk p-4 border-theme rounded-circle d-flex m-auto">
                                                        <img src="{{asset('assets/img/equestrian.png')}}" alt="Product Category"></div>
                                                        <div class="content-blk">
                                                        <h3 class="pt-4 pb-2">Sell</h3>
                                                        <h5>{{$sellProducts}} Products</h5>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-4">
                                            <div class="border-theme radius-1 p-4 mb-6">
                                                <a href="javascript:void(0)">
                                                    <div class="icon-blk p-4 border-theme rounded-circle d-flex m-auto">
                                                        <img src="{{asset('assets/img/treadmill.png')}}" alt="Product Category"></div>
                                                        <div class="content-blk">
                                                        <h3 class="pt-4 pb-2">Rent</h3>
                                                        <h5>{{$rentProducts}} Products</h5>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-4">
                                            <div class="border-theme radius-1 p-4 mb-6">
                                                <a href="javascript:void(0)">
                                                    <div class="icon-blk p-4 border-theme rounded-circle d-flex m-auto">
                                                        <img src="{{asset('assets/img/water.png')}}" alt="Product Category"></div>
                                                        <div class="content-blk">
                                                        <h3 class="pt-4 pb-2">Exchange</h3>
                                                        <h5>{{$exchangeProducts}} Products</h5>
                                                    </div>
                                                </a>
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
    <hr>
    <section class="pdt-cat-wrapper py-6">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="pdt-cat-blk text-center">
                        <div class="row">
                        <div class="col-lg-8 col-md-10 m-auto">
                            <div class="mb-6">
                                <h2 class="text-capitalize">{{__('site.sportees_catalogue')}}</h2>
                                <h5 class="mt-4">{{__('site.sportees_catalogue_description')}}</h5>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-12">
                            <div class="pdt-cat-grid">
                            <div class="row">
                                @foreach($categories as $category)
                                <div class="col-sm-6 col-md-6 col-lg-4">
                                    <div class="border-theme radius-1 p-4 mb-6">
                                        <a href="{{route('buy',['category_id' => $category->id])}}">
                                            <div class="icon-blk p-4 border-theme rounded-circle d-flex m-auto">
                                                <img src="{{$category->image_url}}" alt="Product Category"></div>
                                                <div class="content-blk">
                                                <h3 class="pt-4 pb-2">{{$category->name}}</h3>
                                                <h5>{{$category->products_count}} Products</h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-12">
                                <div class="view-pdt-btn">
                                    <a href="{{route('buy')}}" class="btn btn-md btn-theme radius-5 text-white py-3 px-4 text-capitalize shadow-theme-lg">{{__('site.view_all_products')}}</a>
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

    <section class="pdt-filter-wrapper border-top py-6">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-8 col-md-10 m-auto">
                    <div class="mb-6">
                        <h2 class="text-capitalize">{{__('site.latest_products')}}</h2>
                        <h5 class="mt-4">{{__('site.latest_products_description')}}</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($products as $product)
                <div class="col-xl-4 col-md-6 pdt card-deck mx-0">
                    <div class="card mx-0 shadow border">
                        <div class="card-image product-img-grid">
                        <img class="card-img-top product-img-elem" src="{{$product->product_images[0]->image_path}}" alt="Card image">
                        <div class="image-overlay">
                            <a href="{{route('product-details',['id' => $product->id])}}" class="btn btn-outline-white radius-5 py-3 px-4 text-capitalize">More Info</a>
                        </div>
                        </div>
                        <div class="card-body p-3">
                        <h4 class="card-title mb-0"><a href="{{route('product-details',['id' => $product->id])}}"
                            class="text-link">{{$product->name}}</a></h4>
                        <div class="card-text">
                            <div class="card-section-1 py-3">
                            <div class="row align-items-center">
                                <div class="col-6">
                                <div class="media align-items-center">
                                    <a href="javascript:void(0)" class="text-link d-inline-block">
                                    <img src="{{$product->user->profile_image}}" alt="John Doe" class="mr-3 rounded-circle user-avatar-50 d-inline-block">
                                    <div class="media-body d-inline-block">
                                        <p><strong>{{$product->user->name}}</strong></p>
                                    </div>
                                    </a>
                                </div>
                                </div>
                                <div class="col-6">
                                <div class="pdt-cat-tag text-right">
                                    <span class="bg-theme text-white px-3 py-1
                                    radius-5">{{$product->product_category->name}}</span>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="card-section-3 py-3">
                            <div class="row">
                                <div class="col-12">
                                <div class="pdt-description">
                                    <p class="text-truncate">{{$product->description}}</p>
                                </div>
                                </div>
                            </div>
                            </div>
                            <hr class="mt-0">
                            <div class="card-section-4">
                            <div class="row">
                                <div class="col-12">
                                <div class="pdt-add-to-cart text-center">
                                    @if(Auth::check())
                                    <a class="btn-outline-theme d-block radius-5 px-3 py-2" onclick="addToCart({{$product}})" href="javascript:void(0)">
                                    <span class="lnr lnr-cart"></span>&nbsp;Add to
                                    Cart -
                                    <span class=""><i class="fa fa-euro"></i>&nbsp;{{$product->offer_price}}</span>
                                    </a>
                                    @else
                                    <a class="btn-outline-theme d-block radius-5 px-3 py-2" href="javascript:void(0)">
                                        <span class=""><i class="fa fa-euro"></i>&nbsp;{{$product->offer_price}}</span>
                                    </a>
                                    @endif
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
            @if(count($products) > 0)
            <div class="row">
                <div class="col-12">
                    <div class="view-pdt-btn text-center mt-5">
                        <a href="{{route('buy')}}" class="btn btn-md btn-theme radius-5 text-white py-3 px-4 text-capitalize shadow-theme-lg">{{__('site.view_all_products')}}</a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>

    <section class="bg-theme-secondary py-6">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-10 text-center mx-auto">
                    <div class="mb-6 text-white text-center">
                        <h2>{{__('site.our_clients_feedback')}}</h2>
                        <h5 class="mt-4">{{__('site.our_clients_feedback_description')}}</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">

                <div id="carouselClientFeedback" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row client-feedback">
                                <div class="col-md-3">
                                    <div class="box shadow border-theme radius-1 p-4 text-center">
                                        <span class="ml-n5 mt-n3 display-1 text-theme position-absolute">“</span>
                                        <img class="img-fluid rounded-circle" src="assets/img/gary.jpg" alt="Testimonial
                                        Author avatar">
                                        <div class="testi-contents">
                                        <h4 class="text-theme my-4">Gary Stern</h4>
                                        <p class="text-white">It was a good experience to buy first time from Sportees.nl.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="box shadow border-theme radius-1 p-4 text-center">
                                        <span class="ml-n5 mt-n3 display-1 text-theme position-absolute">“</span>
                                        <img class="img-fluid rounded-circle" src="assets/img/widjay.jpg" alt="Testimonial Author
                                        avatar">
                                        <div class="testi-contents">
                                        <h4 class="text-theme my-4">Widjay</h4>
                                        <p class="text-white">The website layout is very user-friendly and easy to find your favourite products.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="box shadow border-theme radius-1 p-4 text-center">
                                        <span class="ml-n5 mt-n3 display-1 text-theme position-absolute">“</span>
                                        <img class="img-fluid rounded-circle" src="assets/img/sonia.jpg" alt="Testimonial Author avatar">
                                        <div class="testi-contents">
                                        <h4 class="text-theme my-4">Sonia Mehta</h4>
                                        <p class="text-white">I sold my used bicycle at Sportees.nl without any delay in payment.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row client-feedback">
                                <div class="col-md-3">
                                    <div class="box shadow border-theme radius-1 p-4 text-center">
                                        <span class="ml-n5 mt-n3 display-1 text-theme position-absolute">“</span>
<img class="img-fluid rounded-circle" src="assets/img/teresa.jpg" alt="Testimonial
                                        Author avatar">
                                        <div class="testi-contents">
                                        <h4 class="text-theme my-4">Teresa Ashley</h4>
                                        <p class="text-white">It was a new thing for me to rent quality saddle for my horse from Sportees online platform.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="box shadow border-theme radius-1 p-4 text-center">
                                        <span class="ml-n5 mt-n3 display-1 text-theme position-absolute">“</span>
                                        <img class="img-fluid rounded-circle" src="assets/img/adnan.jpg" alt="Testimonial Author
                                        avatar">
                                        <div class="testi-contents">
                                        <h4 class="text-theme my-4">Adnan Sarwar</h4>
                                        <p class="text-white">Sportees.nl has helped me to sell my dead stocks of sports wear with profit margins.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="box shadow border-theme radius-1 p-4 text-center">
                                        <span class="ml-n5 mt-n3 display-1 text-theme position-absolute">“</span>
                                        <img class="img-fluid rounded-circle" src="assets/img/kiran.jpg" alt="Testimonial Author avatar">
                                        <div class="testi-contents">
                                        <h4 class="text-theme my-4">Kiran Gouda</h4>
                                        <p class="text-white">I always found Sportees team cooperative and professional in selling my products. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselClientFeedback" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselClientFeedback" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                </div>
            </div>
        </div>
    </section>

    <section class="insights-wrapper py-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 text-center mx-auto">
                    <div class="mb-6 text-center">
                        <h2 class="text-capitalize">{{__('site.trending_blog_news')}}</h2>
                        <h5 class="mt-4">{{__('site.trending_blog_news_description')}}</h5>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($blogs as $blog)
                <div class="col-xl-4 col-lg-4 col-md-6 insights mx-0 mb-4 mb-md-0">
                    <div class="card mx-0">
                        <div class="card-image product-img-grid">
                            <img class="card-img-top product-img-elem" src="{{$blog->image_url}}" alt="Card image">
                        </div>
                        <div class="card-body p-3">
                        <h4 class="card-title mb-0"><a href="blog-single-post.html"
                            class="text-grey">{{$blog->title}}</a></h4>
                        <div class="card-text">
                            <div class="card-section-1 py-3">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="pdt-description">
                                            <p class="text-truncate">{{$blog->details}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-0">
                            <div class="card-section-2">
                            <div class="row">
                                <div class="col-6">
                                <div class="insight-posted-date">
                                    <span class="lnr lnr-clock text-theme"></span>
                                    <span>&nbsp;{{Carbon\Carbon::parse($blog->created_at)->format('d M Y')}}</span>
                                </div>
                                </div>
                                <div class="col-6">
                                <div class="insight-share text-right">
                                    <a href="{{route('blog-details',['id' => $blog->id])}}">
                                    <span>&nbsp;View Detial</span>
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

            @if(count($blogs) > 0)
            <div class="row">
                <div class="col-12">
                    <div class="text-center mt-6">
                        <a href="{{route('blog')}}" class="btn btn-md btn-theme radius-5 text-white py-3 px-4 text-capitalize shadow-theme-lg">view all blogs</a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
    
    <news-subscription-component></news-subscription-component>
@endsection
