@extends('layouts.app_layout')

@section('content')

@include('layouts.small_banner',['title' => 'Checkout'])

<section class="checkout py-5">
    <div class="container">
        <checkout-component stripe="{{ env('STRIPE_KEY') }}"></checkout-component>
    </div>
</section>
    
@endsection