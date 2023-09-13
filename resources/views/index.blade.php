@extends('layouts.master')
@section('title', 'Главная')

@section('content')

<!-- Welcome Blog Slide Area Start -->
<x-index-main-slider></x-index-main-slider>
<!-- Welcome Blog Slide Area End -->

<!-- Latest News Marquee Area Start -->
<x-latest-news-ribbon></x-latest-news-ribbon>
<!-- Latest News Marquee Area End -->

<!-- Main Content Area Start -->
<section class="main-content-wrapper section_padding_100">

    <div class="container">
        <div class="row">

            <x-popular-news-index></x-popular-news-index>

            <div class="col-12 col-lg-3 col-md-6">
                <div class="sidebar-area">

                    <x-news-widget></x-news-widget>

                    <!-- Advert Widget -->
                    <x-ad-sidebar></x-ad-sidebar>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content Area End -->

    <!-- Catagory Posts Area Start -->
    <x-news-list-paginate :perPage="25"></x-news-list-paginate>
    <!-- Catagory Posts Area End -->
</section>

<x-popular-news-carousel></x-popular-news-carousel>

@endsection('content')
