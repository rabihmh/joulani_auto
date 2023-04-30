<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Joulani Auto">
    @include('layouts.head')
</head>

<body class="main-body app sidebar-mini" data-id="{{\Illuminate\Support\Facades\Auth::id()}}">
<!-- Loader -->
<div id="global-loader">
    <img src="{{URL::asset('assets/img/loader.svg')}}" class="loader-img" alt="Loader">
</div>
<!-- /Loader -->
@include('layouts.main-sidebar')
<!-- main-content -->
<div class="main-content app-content">
    @include('layouts.main-header')
    <!-- container -->
    <div class="container-fluid">
@yield('page-header')
@include('layouts.flash-message')
@yield('content')
@include('layouts.sidebar')
@include('layouts.models')
@include('layouts.footer')
@include('layouts.footer-scripts')
</body>
</html>
