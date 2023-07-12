@extends('layouts.app_layout')

@section('content')

@include('layouts.small_banner',['title' => 'Contact Us'])

    <section class="contact-wrapper py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="">
                        <h3 class="text-capitalize"><strong>How Can We Help?</strong></h3>
                        <p class="my-4">Laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats. Lid est laborum dolo rumes fugats untras.</p>
                        <h4 class="text-capitalize"><strong>HeadQuarters</strong></h4>
                        <address class="mt-4 mb-0">
                            <div class="media align-items-center mb-2">
                                <span class="lnr lnr-phone-handset"></span>
                                <div class="media-body ml-2">
                                    <p>Phone: (850) 386-7896</p>
                                </div>
                            </div>
                            <div class="media align-items-center mb-2">
                                <span class="lnr lnr-envelope"></span>
                                <div class="media-body ml-2">
                                    <p><a href="../cdn-cgi/l/email-protection.html#0f7c7a7f7f607d7b4f6a776e627f636a216c6062"> <span class="__cf_email__" data-cfemail="186b6d6868776a6c587d60797568747d367b7775">[email&#160;protected]</span></a></p>
                                </div>
                            </div>
                            <div class="media align-items-center mb-0">
                                <span class="lnr lnr-map-marker"></span>
                                <div class="media-body ml-2">
                                    <p>1603 Old York Rd, Houma, LA, 75429 </p>
                                </div>
                            </div>
                        </address>
                    </div>
                </div>
                <contact-us-component></contact-us-component>
            </div>
        </div>
    </section>
    
@endsection