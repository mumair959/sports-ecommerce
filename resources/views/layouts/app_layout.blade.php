<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sell, Buy, Rent or Exchange Used Sports Items. | Used Sports Gear and Fitness Equipment | Sportees</title>
    <meta name="keywords" content="sports online shop", "used sports", "sell your sport stuff", "sports stuff", "rent sports items", "exchange sports items", "sportees.nl", "old sports items", "sports stocks">
    <meta name="title" content="Sell, Buy, Rent or Exchange Used Sports Items. | Used Sports Gear and Fitness Equipment | Sportees"> 
    
    <meta name="description" content="Netherlands' first online marketplace to buy, sell, rent or exchange used sports gear and fitsness equipment. You can buy used sports cycle, sell your old golf kit, rent your excercise machine, or exchange your newly purchased sports gloves at Sportees.nl.">
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon.ico')}}">

    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/plugins/linearicon/css/lnr-icon.css')}}">

    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/plugins/slick/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/slick/css/slick-theme.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" id="color">

    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
<!--[if lt IE 9]>
      <script src="https://nookx.dreamguystech.com/template-1/assets/js/html5shiv.min.js"></script>
      <script src="https://nookx.dreamguystech.com/template-1/assets/js/respond.min.js"></script>
      <![endif]-->
</head>
<body>

<div class="home-wrapper" id="app">

    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')

</div>

<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/plugins/slick/js/slick.min.js')}}"></script>
<script src="/js/lang.js"></script>
<script src="{{asset('assets/js/script.js')}}"></script>
<script src="{{asset('assets/js/cart.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
</body>
</html>