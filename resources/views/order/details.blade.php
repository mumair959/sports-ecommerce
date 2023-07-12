@extends('layouts.app_layout')

@section('content')

@include('layouts.small_banner',['title' => 'Dashboard'])

    <section class="user-dashboard py-5">
        <div class="container">

            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <aside class="pdt-filter-blk card mb-4 shadow">
                        <div class="card-header dashboard-menu-header bg-white p-4">
                            <h3 class="card-title mb-0 d-inline-block">Menu</h3>
                        </div>

                        <ul class="p-4 footer-list-style dashboard-menu-option">
                            <li>
                                <a class="text-footer" href="{{route('dashboard')}}"><i class="lnr lnr-chevron-right mr-2"></i>Products</a>
                            </li>
                            <hr>
                            <li>
                                <a class="text-footer" href="{{route('admin-orders-list')}}"><i class="lnr lnr-chevron-right mr-2"></i>Orders</a>
                            </li>
                            <hr>
                            <li>
                                <a class="text-footer" href="{{route('admin-blogs-list')}}"><i class="lnr lnr-chevron-right mr-2"></i>Blogs</a>
                            </li>
                            <hr>
                        </ul>
                        
                    </aside>
                </div>

                <div class="col-12 col-lg-8">
                    <div class="card shadow border mb-10">
                        <div class="card-header bg-white p-4">
                            <h4 class="card-title mb-0 text-capitalize">Order Detail</h4>
                        </div>
                        <div class="card-body p-4">
                            @if (Session::get('success'))  
                                <div class="alert alert-success alert-block">  
                                    <button type="button" class="close" data-dismiss="alert">x</button>   
                                        <strong>{{ Session::get('success') }}</strong>  
                                </div>  
                            @endif

                            <div class="row">
                                <div class="col-md-6">
                                    <label class="custom-label">Order Number: <strong>{{$order->ordernum}}</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="custom-label">Customer Name: <strong>{{$order->user->name}}</strong></label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label class="custom-label">Total Amount: <strong>$ {{$order->total_amount}}</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="custom-label">Order Date: <strong>{{Carbon\Carbon::parse($order->created_at)->format('d M Y')}}</strong></label>
                                </div>
                            </div>

                            <div class="table-responsive"> 
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product</th>
                                            <th scope="col">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->order_items as $item)
                                        <tr>
                                            <td>{{$item->product->name}}</td>
                                            <td>$ {{$item->amount}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="card shadow border mb-0">
                        <div class="card-header bg-white p-4">
                            <h4 class="card-title mb-0 text-capitalize">Shipping Detail</h4>
                        </div>
                        <div class="card-body p-4">

                            <div class="row">
                                <div class="col-md-6">
                                    <label class="custom-label">Customer Name: <strong>{{$order->user->shipping_infos->first_name.' '.$order->user->shipping_infos->last_name}}</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="custom-label">Customer Email: <strong>{{$order->user->shipping_infos->email}}</strong></label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label class="custom-label">Address: <strong>{{$order->user->shipping_infos->address_1}}</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="custom-label">City: <strong>{{$order->user->shipping_infos->city}}</strong></label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label class="custom-label">Country: <strong>{{$order->user->shipping_infos->country}}</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="custom-label">Zip: <strong>{{$order->user->shipping_infos->zipcode}}</strong></label>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                    
                </div>
            </div>

        </div>
    </section>
    
@endsection