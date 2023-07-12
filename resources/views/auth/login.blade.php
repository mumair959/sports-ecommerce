@extends('layouts.app_layout')

@section('content')

@include('layouts.small_banner',['title' => __('site.login')])

<div class="contact-wrapper py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="modal-header d-block text-center p-2 p-sm-5 remove-bottom-border">
                    <h3 class="modal-title">{{__('site.welcome_back')}}</h3>
                    <h5 class="mt-2 mr-0">{{__('site.you_can_sign_in_with_your_email')}}</h5>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group mb-4">
                        <label for="usr">{{__('site.email')}}</label>
                        <input type="text" class="form-control bg-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required id="usr" placeholder="Enter your Email...">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="pwd">{{__('site.password')}}</label>
                        <input type="password" class="form-control bg-input @error('password') is-invalid @enderror" name="password" required id="pwd" placeholder="Enter your Password...">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="pl-2 custom-control-label" for="customCheck">{{__('site.remember_me')}}</label>
                        </div>
                    </div>

                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-md btn-theme text-white py-2 px-4 py-sm-3 px-sm-5 text-capitalize shadow-theme-lg">{{__('site.login_now')}}</button>
                        <p>Forgot Password? <a href="{{route('password.request')}}">Click Here</a></p>
                    </div>

                </form>

                <hr>

                <div class="modal-footer d-block position-relative border-0 p-4 p-sm-5 text-center">
                    <h5>{{__('site.dont_have_account')}}? {{__('site.signup_now')}}</h5>
                    
                    <div class="form-group mb-0">
                        <a href="{{route('register')}}" class="btn btn-md btn-block btn-theme text-white py-2 px-4 py-sm-3 px-sm-5 text-capitalize shadow-theme-lg">{{__('site.register_now')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
