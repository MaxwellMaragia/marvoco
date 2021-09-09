@extends('website/layouts/app')

{{--meta tags--}}
{{--@section('meta')--}}
{{--    <title>{{ $seo->page_title }}</title>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="IE=edge" />--}}
{{--    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />--}}
{{--    <meta name="author" content="{{ $seo->author }}">--}}
{{--    <!-- description -->--}}
{{--    <meta name="title" content="{{ $seo->title }}">--}}
{{--    <meta name="description" content="{{ $seo->description }}">--}}
{{--    <!-- keywords -->--}}
{{--    <meta name="keywords" content="{{ $seo->keywords }}">--}}
{{--    <meta name="language" content="{{ $seo->language }}">--}}
{{--    <meta name="revisit-after" content="{{ $seo->revisit_after }}">--}}
{{--@endsection--}}
{{--end meta tags--}}

@section('main-content')
    <!-- LOADER -->
    <div id="loader-wrapper">
        <div id="loader"></div>
    </div>
    <!-- LOADER -->
    <div class="home-slider">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <!-- Slide One - Set the background image for this slide in the line below -->
                @foreach($banners as $banner)
                 <div class="carousel-item active" style="background-image: url({{ Storage::url($banner->image) }})">
                    <div class="container">
                        <div class="slider-caption slider-caption-alt">
                            <h2 class="display-4 animated fadeInRight">{{ $banner->title_top }} <br><span>{{ $banner->title_bottom }}</span></h2>
                            <p class="lead animated fadeInRight">{{ $banner->subtitle }}</p>
                            <div class="btn-more"><a class="btn btn-slider" href="{{ $banner->url }}" role="button">{{ $banner->button_text }}</a></div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Slide Two - Set the background image for this slide in the line below -->
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon custom-control" aria-hidden="true" style="background-image: url({{ asset('left-arrow.svg') }});"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon custom-control" aria-hidden="true" style="background-image: url({{ asset('right-arrow.svg') }});"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <!--SERVICES SECTION START-->
    <div class="grid-carousel-container-alt">
        <div class="grid-carousel-alt slider">
            @foreach($)
            <div class="slide">
                <div class="grid-layer">
                    <figure class="gl-thumbnail"><img src="img/images/oil-and-gas-img1.jpg" alt=""></figure>
                    <div class="gl-caption">
                        <h3>Refinery</h3>
                        <p>Nemo enim ipsam voluptatem</p>
                        <div class="btn-more"><a class="btn btn-custom" href="#" role="button">Learn More</a></div>
                    </div>
                    <div class="gl-overlay-alt"></div>
                </div>
            </div>
        </div>
    </div>
    <!--SERVICES SECTION END-->
@endsection

