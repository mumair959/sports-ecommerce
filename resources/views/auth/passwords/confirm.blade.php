@extends('layouts.app_layout')

@section('content')

@include('layouts.small_banner',['title' => 'Confirm Password'])

<div class="contact-wrapper py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="modal-header d-block text-center p-2 p-sm-5 remove-bottom-border">
                    <h3 class="modal-title">Password Confirmation</h3>
                </div>

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-theme text-white py-2 px-4 py-sm-3 px-sm-5 text-capitalize shadow-theme-lg">
                                {{ __('Confirm Password') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection