@extends('layouts.app_layout')

@section('content')

@include('layouts.small_banner',['title' => __('site.sports_and_fitness_equipment_for_exchange')])

<div class="py-5">
    <div class="container">
        <product-listing-component auth={{Auth::check()}} type="exchange"></product-listing-component>
    </div>
</div>
    
@endsection