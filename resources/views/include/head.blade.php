<head>
@php
	$Block_Data3=\App\Model\HomePage::whereid('1')->get();

@endphp
@foreach($Block_Data3 as $block3)
    <title>{{ $block3->page_title }}</title>
@endforeach
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <link rel="stylesheet" href="{{asset('user_assets/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('user_assets/css/animate.css')}}">
    
    <link rel="stylesheet" href="{{asset('user_assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('user_assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('user_assets/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('user_assets/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('user_assets/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('user_assets/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('user_assets/css/jquery.timepicker.css')}}">

    
    <link rel="stylesheet" href="{{asset('user_assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('user_assets/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('user_assets/css/style.css')}}">
	
    <link rel="stylesheet" href="{{asset('user_assets/css/newStyle.css')}}">

{{--    <link rel="stylesheet" href="{{asset('user_assets/css/skin-default.css')}}">--}}
    <link rel="stylesheet" href="{{asset('user_assets/css/feature-text.css')}}">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="/path/to/cdn/bootstrap.min.css" />
    <link rel="stylesheet" href="/path/to/dist/css/multiple-select.css" />
    <script src="/path/to/dist/js/multiple-select.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

  </head>
