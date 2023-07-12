@extends('layouts.app_layout')

@section('content')

@include('layouts.small_banner',['title' => __('site.buy_sports_gear_and_fitness_equipment')])

<div class="py-5">
    <div class="container">
        <product-listing-component type="sell" category={{empty($category_id) ? 'null' : $category_id}} auth={{Auth::check()}}></product-listing-component>
    </div>
</div>
    
@endsection