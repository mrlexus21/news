@extends('layouts.master')
@section('title', $post->title . __('admin.news'))
@php /** @var \App\Models\Post $post */  @endphp

@section('content')

    <section class="single-post-area">
        <!-- Single Post Title -->
        <div class="single-post-title bg-img background-overlay" style="background-image: url({{ Storage::url($post->image) }});">
            <div class="container h-100">
                <div class="row h-100 align-items-end">
                    <div class="col-12">
                        <div class="single-post-title-content">
                            <!-- Post Tag -->
                            <div class="gazette-post-tag">
                                <a href="{{ route('category', $post->category) }}">{{ $post->category->name }}</a>
                            </div>
                            <h2 class="font-pt">{{ $post->title }}</h2>
                            <p>{{ $post->middleFormatDate }}</p>

                            @isset($post->user)
                                <div class="row article-author">
                                    @isset($post->user->image)
                                        <div class="col-md-1">
                                            <div class="comment-author">
                                                <img src="{{ Storage::url('userimages/' . $post->user->image) }}" alt="">
                                            </div>
                                        </div>
                                    @endisset
                                    <div class="col-md-5 ml-4">
                                        <h5>{{ $post->user->name }}</h5>
                                        @auth
                                            <button type="submit" class="btn btn-primary float-left">@lang('main.to_subscribe')</button>
                                        @endauth
                                    </div>
                                </div>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="single-post-contents">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 single-post-text">
                        {{ $post->getContent() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection('content')
