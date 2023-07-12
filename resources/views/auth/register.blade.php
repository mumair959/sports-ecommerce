@extends('layouts.app_layout')

@section('content')

@include('layouts.small_banner',['title' => __('site.register')])

<div class="contact-wrapper py-5">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="modal-header d-block text-center p-2 p-sm-5 remove-bottom-border">
                    <h3 class="modal-title">{{__('site.create_your_account')}}</h3>
                    <h5 class="mt-2 mr-0">{{__('site.register_subtitle_text')}}</h5>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group mb-4">
                        <label for="name">{{__('site.your_name')}}</label>
                        <input type="text" class="form-control bg-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required id="name" placeholder="Enter your name...">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control bg-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required id="email" placeholder="Enter your email address...">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="pwdd">{{__('site.password')}}</label>
                        <input type="password" class="form-control bg-input @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required id="pwdd" placeholder="Enter your password...">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="pwd-confirm">{{__('site.confirm_password')}}</label>
                        <input type="password" name="password_confirmation" class="form-control bg-input" id="pwd-confirm" placeholder="Enter your password...">
                    </div>
                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-md btn-theme text-white py-2 px-4 py-sm-3 px-sm-5 text-capitalize shadow-theme-lg">{{__('site.register_now')}}</button>
                    </div>

                </form>

                <hr>

                <div class="modal-footer d-block position-relative border-0 p-4 p-sm-5 text-center">
                    <h5>{{__('site.already_have_an_account')}}? {{__('site.login_now')}}</h5>
                    
                    <div class="form-group mb-0">
                        <a href="{{route('login')}}" class="btn btn-md btn-block btn-theme text-white py-2 px-4 py-sm-3 px-sm-5 text-capitalize shadow-theme-lg">{{__('site.login_now')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
