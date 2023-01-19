<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>
        @if (isset($page_title))
            {{$page_title}}
        @else
            Alphalink Global Solutions
        @endif
    </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-theme.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontAwesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/hero-slider.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl-carousel.css')}}">
    <link rel="stylesheet" href="{{asset('css/templatemo-style.css')}}">
    <link rel="stylesheet" href="{{asset('css/lightbox.css')}}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>