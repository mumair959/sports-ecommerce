@extends('layouts.app_layout')

@section('content')

@include('layouts.small_banner',['title' => 'Add Items to Rent'])

    <div class="user-add-item act-stgs py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <aside class="sidebar sidebar-user">
                        <div class="user-card shadow border p-4">
                            <div class="user-info">
                                <div class="user-avatar text-center mb-4">
                                    <img src="{{Auth::user()->profile_image}}" alt="User Avatar" class="position-relative img-fluid rounded-circle profile-img">
                                </div>
                                <div class="user-details text-center">
                                    <h4>{{Auth::user()->name}}</h4>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>

                <div class="col-lg-8 col-md-12 mt-5 mt-md-5 mt-lg-0">
                    <div class="custom-border-left rounded shadow border p-4 mb-4 stg-title">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <h3 class="text-capitalize">Upload Product</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow border mb-0">
                        <div class="card-header bg-white p-4">
                            <h4 class="card-title mb-0 text-capitalize coll-arrow cursor-pointer" data-toggle="collapse" data-target="#name-desc" aria-expanded="true">Product Details</h4>
                        </div>
                        <div id="name-desc" class="card-body p-4 collapse show">
                            <div id="personal-inf" class="">
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
                                <form action="{{route('add-new-product')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="product_type" value="rent">
                                    <div class="form-row mb-4">
                                        <div class="col">
                                            <label class="col-form-label pt-0">Select Category <span class="text-danger">*</span></label>
                                            <select class="select bg-input" name="product_category_id">
                                                <option value="" selected disabled>Select Product Category</option>
                                                @foreach($categories as $index => $cat)
                                                <option value="{{$index}}">{{$cat}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row mb-4">
                                        <div class="col">
                                            <label>Product Name<span class="d-inline-block form-text text-muted">(Max 100 Characters)</span></label>
                                            <input type="text" class="form-control bg-input" name="name" placeholder="Enter your product name here...">
                                        </div>
                                    </div>

                                    <div class="form-row mb-4">
                                        <div class="col">
                                            <label>Product Description</label>
                                            <textarea rows="4" name="description" class="bg-input form-control text-editor" placeholder="Short brief about your product..."></textarea>
                                        </div>
                                    </div>

                                    <div class="form-row mb-4">
                                        <div class="alert alert-warning" style="width: 100%" role="alert">
                                            Images must be have dimensions of 750 x 430 
                                        </div>
                                        <div class="col-lg-6">
                                            <p class="custom-label-style">Image 1</p>
                                            <div class="custom-file">
                                                <input type="file" name="product_images[]" class="custom-file-input" id="customFile-upload1">
                                                <label class="custom-file-label" for="customFile-upload1">Upload Image</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <p class="custom-label-style">Image 2</p>
                                            <div class="custom-file">
                                                <input type="file" name="product_images[]" class="custom-file-input" id="customFile-upload2">
                                                <label class="custom-file-label" for="customFile-upload2">Upload Image</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row mb-4">
                                        <div class="col-lg-6">
                                            <p class="custom-label-style">Image 3</p>
                                            <div class="custom-file">
                                                <input type="file" name="product_images[]" class="custom-file-input" id="customFile-upload3">
                                                <label class="custom-file-label" for="customFile-upload3">Upload Image</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <p class="custom-label-style">Image 4</p>
                                            <div class="custom-file">
                                                <input type="file" name="product_images[]" class="custom-file-input" id="customFile-upload4">
                                                <label class="custom-file-label" for="customFile-upload4">Upload Image</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row mb-4">
                                        <div class="col-lg-6">
                                            <label>Regular Price <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-addon display-5 mr-3">€</span>
                                                <input type="text" name="regular_price" class="form-control bg-input" placeholder="00.00">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Your Price <span class="text-danger">*</span></label>
                                            <div class="input-group align-items-center">
                                                <span class="input-group-addon display-5 mr-3">€</span>
                                                <input type="text" name="offer_price" class="form-control bg-input" placeholder="00.00">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row mb-4">
                                        <div class="col">
                                            <label class="col-form-label pt-0">Select Condition <span class="text-danger">*</span></label>
                                            <select class="select bg-input" name="condition_id">
                                                <option value="" selected disabled>Select Product Condition</option>
                                                @foreach($conditions as $index => $cond)
                                                <option value="{{$index}}">{{$cond}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="save-btn-blk text-center">
                                        <button type="submit" class="btn btn-style btn-block radius-5 text-white py-3 px-5 text-capitalize">Add Product</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection