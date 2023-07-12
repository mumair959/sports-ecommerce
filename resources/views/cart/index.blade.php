@extends('layouts.app_layout')

@section('content')

@include('layouts.small_banner',['title' => 'Cart'])

<section class="user-profile-wrapper py-5">
    <div class="container">
        <cart-component></cart-component>
    </div>
</section>
    
@endsection