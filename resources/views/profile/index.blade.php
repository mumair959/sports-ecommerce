@extends('layouts.app_layout')

@section('content')

@include('layouts.small_banner',['title' => 'Edit Profile'])

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
                                <a class="text-footer" href="{{route('profile')}}"><i class="lnr lnr-chevron-right mr-2"></i>Edit Profle</a>
                            </li>
                        </ul>
                        
                    </aside>
                </div>

                <div class="col-12 col-lg-8">
                    <div class="card shadow border mb-0">
                        <div class="card-header bg-white p-4">
                            <h4 class="card-title mb-0 text-capitalize">Edit Profile</h4>
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
                            <form action="{{route('update-profile')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <div class="form-row mb-4">
                                    <div class="col">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control bg-input" placeholder="Enter your name..."  value="{{$user->name}}">
                                    </div>
                                </div>

                                <div class="form-row mb-4">
                                    <div class="col-lg-12">
                                        <p class="custom-label-style">Profile Image <span class="d-inline-block form-text text-muted">(Resolution 100x100)</span></p>
                                        <div class="custom-file">
                                            <input name="profile_image" type="file" class="custom-file-input" id="customFile-upload1">
                                            <label class="custom-file-label" for="customFile-upload1">Upload Image</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="save-btn-blk text-center">
                                    <button type="submit" class="btn btn-style btn-block radius-5 text-white py-3 px-5 text-capitalize">Update Profile</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    
                </div>
            </div>

        </div>
    </section>
    
@endsection