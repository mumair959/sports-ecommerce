@extends('layouts.app_layout')

@section('content')
    @include('layouts.small_banner',['title' => 'Frequently Asked Questions'])

    <div class="page-wrapper py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <aside class="sidebar shadow border p-0 mb-4 mb-md-0" id="myScrollspy">
                        <div class="title-info p-4">
                            <h4>FAQ Menu Items:</h4>
                        </div>
                        <hr class="m-0">
                        <ul class="list-group nav nav-pills flex-column py-3">
                            <li class="nav-item">
                                <a class="nav-link px-4 py-2 rounded-0" href="faq.html#section1">1. What is Lorem Ipsum?
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link px-4 py-2 rounded-0" href="faq.html#section2">2. Why do we use it?
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link px-4 py-2 rounded-0" href="faq.html#section3">3. Why do we use it?
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link px-4 py-2 rounded-0" href="faq.html#section4">4. Where can I get some?
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link px-4 py-2 rounded-0" href="faq.html#section5">5. When we go there?
                                </a>
                            </li>
                        </ul>
                    </aside>
                </div>
                <div class="col-md-8">
                    <div class="shadow border px-4 py-0">
                        <div id="section1" class="blank-content-blk py-4">
                            <h5 class="text-capitalize drop-cap"><strong>Q </strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h5>
                            <p class="pt-4 drop-cap"><strong>A </strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                        <hr>
                        <div id="section2" class="blank-content-blk py-4">
                            <h5 class="text-capitalize drop-cap"><strong>Q </strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h5>
                            <p class="pt-4 drop-cap"><strong>A </strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                        <hr>
                        <div id="section3" class="blank-content-blk py-4">
                            <h5 class="text-capitalize drop-cap"><strong>Q </strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h5>
                            <p class="pt-4 drop-cap"><strong>A </strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                        <hr>
                        <div id="section4" class="blank-content-blk py-4">
                            <h5 class="text-capitalize drop-cap"><strong>Q </strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h5>
                            <p class="pt-4 drop-cap"><strong>A </strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                        <hr>
                        <div id="section5" class="blank-content-blk py-4">
                            <h5 class="text-capitalize drop-cap"><strong>Q </strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h5>
                            <p class="pt-4 drop-cap"><strong>A </strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
