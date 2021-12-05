<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Site Metas -->
    <title>@yield('title')</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{asset('assets/front/images/favicon.ico')}}" type="image/x-icon"/>
    <link rel="apple-touch-icon" href="{{asset('assets/front/images/apple-touch-icon.png')}}">
    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/front/css/front.css') }}">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="wrapper">
    @include('layouts.navbar-head')

    @yield('header')

@section('title', 'Markedia - Marketing Blog Template :: CCC')

<body>
<div id="page-wrapper">
{{--    @include('layouts.navbar-head')--}}
    <div class="page-title db">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h2>Contact Us</h2>
                </div><!-- end col -->
                <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Contact</li>
                    </ol>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end page-title -->
    <section class="section lb">
        <div class="container">
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <form class="form-wrapper" method="post" action="{{route('contact')}}" >
                                @csrf
                                <h4>Contact form</h4>
                                <input type="text" name="name" class="form-control" placeholder="Your name" required>
                                <input type="email" name="email" class="form-control" placeholder="Email address" required>
                                <textarea class="form-control" name="text" placeholder="Your message" required></textarea>
                                <button type="submit" class="btn btn-primary">Send <i class="fa fa-envelope-open-o"></i>
                                </button>
                            </form>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            @include('layouts.sidebar')
                        </div><!-- end col -->
                    </div>
                </div><!-- end page-wrapper -->
            </div><!-- end col -->

        </div><!-- end row -->
    </section>
</div><!-- end container -->
</body>
</div>
@include('layouts.footer')
<script src="{{ asset('assets/front/js/front.js') }}"></script>
