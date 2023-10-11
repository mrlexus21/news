<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title  -->
    <title>@yield('title')</title>

    <!-- Favicon  -->
    <link rel="icon" href="favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{ asset('css/public/app.css') }}">
</head>

<body class="@yield('body_class')">
<!-- Header Area Start -->
<header class="header-area">
    <x-top-header></x-top-header>
    <!-- Middle Header Area -->
    <div class="middle-header">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <!-- Logo Area -->
                <div class="col-12 col-md-4">
                    <div class="logo-area">
                        <a href="{{ route('home') }}"><img src="/img/logo.png" alt="logo"></a>
                    </div>
                </div>
                <!-- Header Advert Area -->
                <div class="col-12 col-md-8">
                    <x-ad-header></x-ad-header>
                </div>
            </div>
        </div>
    </div>
    @isset($categories)
        <!-- Bottom Header Area -->
        <div class="bottom-header">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="main-menu">
                            <nav class="navbar navbar-expand-lg">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#gazetteMenu" aria-controls="gazetteMenu" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i> Menu</button>
                                <div class="collapse navbar-collapse" id="gazetteMenu">
                                    <ul class="navbar-nav mr-auto">
                                        <li class="nav-item @routeactive('home')">
                                            <a class="nav-link" href="{{ route('home') }}">@lang('main.today')</a>
                                        </li>
                                        @foreach($categories as $category)
                                            <li class="nav-item {{ classActiveSegment(2, $category->slug) }}">
                                                <a class="nav-link" href="{{ route('category', $category) }}">{{ $category->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <!-- Search Form -->
                                    <div class="header-search-form mr-auto">
                                        <form action="{{ route('search') }}">
                                            <input type="search" placeholder="@lang('main.search_placeholder')" id="search" name="q">
                                            <input class="d-none" type="submit" value="submit">
                                        </form>
                                    </div>
                                    <!-- Search btn -->
                                    <div id="searchbtn">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </div>
                                    <div id="userhbtn">
                                        <a href="{{ route($personalRoute) }}">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endisset
</header>
<!-- Header Area End -->
@yield('personal_layout_head')
@yield('content')
@yield('personal_layout_footer')
<!-- Footer Area Start -->
<footer class="footer-area bg-img background-overlay">
    @isset($categories)
        <!-- Top Footer Area -->
        <div class="top-footer-area section_padding_100_70">
            <div class="container">
                <div class="row">
                    <!-- Single Footer Widget -->
                    @foreach($categories as $category)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="single-footer-widget">
                                <div class="footer-widget-title">
                                    <a class="nav-link" href="{{ route('category', $category) }}">
                                        <h4 class="font-pt">{{ $category->name }}</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- Single Footer Widget -->
                </div>
            </div>
        </div>
    @endisset

    <!-- Bottom Footer Area -->
    <div class="bottom-footer-area">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12">
                    <div class="copywrite-text">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            &copy;<script>document.write(new Date().getFullYear());</script> @lang('main.all_rights_received') | @lang('main.template_made_with_by') <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Area End -->

<script src="{{ asset('/js/public/app.js') }}"></script>

</body>

</html>
