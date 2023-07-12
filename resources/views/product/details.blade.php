@extends('layouts.app_layout')

@section('content')

@include('layouts.small_banner',['title' => 'Product Details'])

<div class="single-pdt-page py-5">
    <div class="container">
    <div class="row">
        <div class="col-lg-4 col-xl-4">
        <aside class="sidebar sidebar-user">
            <div class="user-card shadow border bg-white p-4 text-center">
            <div class="user-info">
                <div class="user-avatar mb-4">
                <img src="{{$product->user->profile_image}}" alt="User Avatar" class="img-fluid rounded-circle border-theme user-avatar-100">
                </div>
                <div class="user-details">
                <h4>{{$product->user->name}}</h4>
                </div>
                <div class="rating-blk text-center d-inline-block">
                </div>
            </div>
            </div>
            <div class="sidebar-pdt-desc mt-4">
            <div class="shadow border p-4 text-center">
                <div class="sidebar-price-tag">
                <h2 class="text-theme"><strong>$ {{$product->regular_price}}</strong></h2>
                </div>
                <hr class="my-4">
                <div class="pricing-cta">
                    @if(Auth::check())
                    <a href="javascript:void(0)" onclick="addToCart({{$product}})" class="d-inline-block btn btn-outline-theme radius-5 btn-sm px-4 py-2 ">
                        <span class="d-inline-block"> Add To Cart</span>
                    </a>
                    @else
                    <a href="{{route('login')}}" class="d-inline-block btn btn-outline-theme radius-5 btn-sm px-4 py-2 ">
                        <span class="d-inline-block"> Login To Buy</span>
                    </a>
                    @endif
                </div>
            </div>
            </div>
        </aside>
        </div>
        <div class="col-lg-8 col-xl-8 mt-5 mt-md-5 mt-lg-0">
        <div class="custom-border-left rounded shadow border p-4
            bg-white mb-4 stg-title">
            <div class="row align-items-center">
            <div class="col-12">
                <h3 class="text-capitalize">{{$product->name}}</h3>
            </div>
            </div>
        </div>

        <div class="pdt-item-showcase shadow border">
            <div id="productSlider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach($product->product_images as $index => $img)
                    <div class="carousel-item {{$index == 0 ? 'active' : ''}}">
                        <img class="d-block w-100" src="{{$img->image_path}}" alt="First slide">
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#productSlider" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#productSlider" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <div class="pdt-item-info mt-4 shadow border">
            <div class="pdt-item-nav p-4">
                <h2>Product Details</h2>
            </div>
            <hr>
            <div class="tab-content">
                <div class="fade show tab-pane product-tab active" id="product-details">
                    <div class="tab-content-wrapper p-4">
                        <p>{{$product->description}}</p>
                    </div>
                    @if(!Auth::check())
                    <hr>
                    <div style="margin-bottom: 20px; text-align: right">
                        <a href="{{route('login')}}" class="d-inline-block btn btn-outline-theme radius-5 px-4 py-2">
                            <span class="d-inline-block"> Login To Buy >></span>
                        </a>
                    </div>
                    @endif
                </div>
            </div>

            </div>
        </div>

        </div>
    </div>
</div>
    
@endsection