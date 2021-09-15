@extends('website/layouts/app')


@section('meta')
    <title>{!! htmlspecialchars_decode($product->name) !!}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    <meta name="author" content="Pan Africa Chemicals">
    <!-- description -->
    <meta name="title" content="Pan Africa Chemicals">
    <meta name="description" content="{!! htmlspecialchars_decode($product->name) !!}">
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
                <h1>{!! htmlspecialchars_decode($product->name) !!}</h1>
                <p><a href="{{ url('/') }}">Home</a> &nbsp; > &nbsp; <a href="#">Premier product</a></p>
            </div>
        </div>
    </div>

    <!-- CONTENT START -->
    <section>
        <div class="container">
            <div class="row">
                <!-- SINGLE product CONTENT START -->
                <div class="col-lg-8 col-xl-9">
                    <figure class="product-image"><img src="{{ Storage::url($product->image) }}" alt=""></figure>
                    <div class="product-content">
                        {!! htmlspecialchars_decode($product->body) !!}
                    </div>

                </div>
                <!-- SINGLE product CONTENT END -->

            </div>
        </div>

    </section>
    <!-- CONTENT START -->


@endsection



