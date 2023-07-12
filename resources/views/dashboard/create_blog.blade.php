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
                            <h4 class="card-title mb-0 text-capitalize">Create New Blog</h4>
                        </div>
                        <div class="card-body p-4">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div><br />
                            @endif
                            @if (Session::get('success'))  
                                <div class="alert alert-success alert-block">  
                                    <button type="button" class="close" data-dismiss="alert">x</button>   
                                        <strong>{{ Session::get('success') }}</strong>  
                                </div>  
                            @endif  
                            <form action="{{route('admin-save-blog')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row mb-4">
                                    <div class="col">
                                        <label>Blog Title <span class="d-inline-block form-text text-muted">(Max 100 Characters)</span></label>
                                        <input type="text" name="title" class="form-control bg-input" placeholder="Enter your blog title here...">
                                    </div>
                                </div>

                                <div class="form-row mb-4">
                                    <div class="col">
                                        <label>Blog Detial</label>
                                        <textarea rows="4" name="details" class="bg-input form-control text-editor" placeholder="Detial about your blog..."></textarea>
                                    </div>
                                </div>

                                <div class="form-row mb-4">
                                    <div class="col-lg-12">
                                        <p class="custom-label-style">Blog Image</p>
                                        <div class="custom-file">
                                            <input name="image_url" type="file" class="custom-file-input" id="customFile-upload1">
                                            <label class="custom-file-label" for="customFile-upload1">Upload Image</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="save-btn-blk text-center">
                                    <button type="submit" class="btn btn-style btn-block radius-5 text-white py-3 px-5 text-capitalize">Create Blog</button>
                                </div>
                            </form>
                        </div>
                    </div>
                          
                </div>
            </div>

        </div>
    </section>
    
@endsection