@extends('website/layouts/app')


@section('meta')
    <title>{{ $post->title }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    <meta name="author" content="Pan Africa Chemicals">
    <!-- description -->
    <meta name="title" content="Pan Africa Chemicals">
    <meta name="description" content="{{ $post->subtitle }}">
    <meta name="google" content="nositelinkssearchbox" />
    <!-- keywords -->
    {{--    <meta name="keywords" content="{{ $seo->keywords }}">--}}
    {{--    <meta name="language" content="{{ $seo->language }}">--}}
    {{--    <meta name="revisit-after" content="{{ $seo->revisit_after }}">--}}
@endsection


@section('main-content')
    <!-- LOADER -->
    <div id="loader-wrapper">
        <div id="loader"></div>
    </div>
    <!-- LOADER -->
    <div class="sections">
        <div class="container">
            <div class="pages-title">
                <h1>{{ $post->title }}</h1>
                <p><a href="{{ url('/') }}">Home</a> &nbsp; > &nbsp; <a href="#">Insights</a></p>
            </div>
        </div>
    </div>

    <!-- CONTENT START -->
    <section>
        <div class="container">
            <div class="row">
                <!-- SINGLE POST CONTENT START -->
                <div class="col-lg-8 col-xl-9">
                    <figure class="post-image"><img src="{{ Storage::url($post->image) }}" alt=""></figure>
                    <div class="post-content">
                        <h2>{{ $post->title }}</h2>
                        {!! htmlspecialchars_decode($post->body) !!}
                    </div>

                </div>
                <!-- SINGLE POST CONTENT END -->

            </div>
        </div>

    </section>
    <!-- CONTENT START -->


@endsection



