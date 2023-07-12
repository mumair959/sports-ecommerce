@extends('layouts.app_layout')

@section('content')
    @include('layouts.small_banner',['title' => __('site.about_sportees')])

    <section class="page-wrapper py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blank-content-blk shadow p-4">
                        <h3 class="text-capitalize"><strong>Lorem Ipsum is simply dummy text of the printing</strong></h3>
                        <p class="py-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        <h4 class="text-capitalize"><strong>Lorem Ipsum is simply dummy text of the printing</strong></h4>
                        <p class="py-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        <h4 class="text-capitalize"><strong>Lorem Ipsum is simply dummy text of the printing</strong></h4>
                        <p class="py-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        <h4 class="text-capitalize"><strong>Lorem Ipsum is simply dummy text of the printing</strong></h4>
                        <p class="py-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        <ul class="pl-0 pl-md-4">
                            <li>1. Lorem Ipsum is simply dummy text of the printing</li>
                            <li>2. Lorem Ipsum is simply dummy text of the printing</li>
                            <li>3. Lorem Ipsum is simply dummy text of the printing</li>
                            <li>4. Lorem Ipsum is simply dummy text of the printing</li>
                            <li>5. Lorem Ipsum is simply dummy text of the printing</li>
                        </ul>
                        <p class="pt-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
