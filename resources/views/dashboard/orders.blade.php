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
                    <div class="card shadow border mb-0">
                        <div class="card-header bg-white p-4">
                            <h4 class="card-title mb-0 text-capitalize">Orders</h4>
                        </div>
                        <div class="card-body p-4">
                            @if (Session::get('success'))  
                                <div class="alert alert-success alert-block">  
                                    <button type="button" class="close" data-dismiss="alert">x</button>   
                                        <strong>{{ Session::get('success') }}</strong>  
                                </div>  
                            @endif
                            <div class="table-responsive"> 
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Order#</th>
                                            <th scope="col">Total Amount</th>
                                            <th scope="col">Customer</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                        <tr>
                                            <td>{{$order->ordernum}}</td>
                                            <td>$ {{$order->total_amount}}</td>
                                            <td>{{$order->user->name}}</td>
                                            <td>
                                                <a href="{{route('order-details',['id' => $order->id])}}" class="btn btn-sm btn-success">View Detail</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>

        </div>
    </section>
    
@endsection