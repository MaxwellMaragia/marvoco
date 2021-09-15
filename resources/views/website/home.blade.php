@extends('website/layouts/app')


@section('meta')
    <title>Pan Africa Chemicals</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    <meta name="author" content="Pan Africa Chemicals">
    <!-- description -->
    <meta name="title" content="Pan Africa Chemicals">
    <meta name="description" content="Pan Africa Chemicals Ltd (PAC), is one of Kenya’s leading manufacturers and suppliers of Industrial and Allied Chemicals. Sulphates, Hydroxides, Acids and more!">
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
            @foreach($categories as $category)
            <div class="slide">
                <div class="grid-layer">
                    <figure class="gl-thumbnail"><img src="{{ Storage::url($category->image) }}" alt="" width="80%" height="213px"></figure>
                    <div class="gl-caption">
                        <h3>{{ $category->name }}</h3>
                        <div class="btn-more"><a class="btn btn-custom" href="{{ url('our-products') }}" role="button">Learn More</a></div>
                    </div>
                    <div class="gl-overlay-alt"></div>
                </div>
            </div>
                @endforeach
        </div>
    </div>
    <!--SERVICES SECTION END-->

    <!-- CONTENT START -->
    <section>
        <!-- ABOUT START -->
        <div class="container">
            <div class="row" >
                <div class="col-lg-6">
                    <div class="og-about" id="about">
                        <h5>ABOUT US</h5>
                        <h2>{{ $about_header->value }}</h2>
                        <div class="btn-more"><a class="btn btn-custom" href="{{ url('contact') }}" role="button">Contact us</a></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="og-info">
                        <p>
                            {{ $about_text->value }}
                        </p>

                    </div>
                </div>
            </div>

            <!-- <hr class="section-divider"> -->


        </div>
        <!-- CONTENT END -->

        <!-- WIDE SECTION START -->
        <div class="container-fluid alt-counter-parallax">
            <div class="container">
                <div class="row">
                    @foreach($deliverables as $deliverable)
                    <div class="col-lg-4">
                        <div class="ab-box text-left">
                            <figure class="ab-icon"><img src="{{ Storage::url($deliverable->icon) }}" alt=""></figure>
                            <div class="ab-caption">
                                <h4>{{ $deliverable->title }}</h4>
                                <p>{{ $deliverable->description }}</p>
                            </div>
                        </div>
                    </div>
                        @endforeach
                </div>
            </div>
        </div>
        <!-- WIDE SECTION END -->

        <div class="container">
            <div class="section-title">
                <h2>Our products</h2>
                <p>We manufacture four premium products</p>
            </div>
            <div class="row">
                @foreach($products as $product)
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="grid-thumbnail hover-thumb1" >

                        <h4>{!! htmlspecialchars_decode( $product->name) !!}</h4>
                        <p>{{ $product->title }}</p>
                    </div>
                    <div class="btn-footer">
                        <h5><a href="{{ route('premier_product',$product->slug) }}">READ MORE</a></h5>
                    </div>
                </div>
                    @endforeach

            </div>

        </div>

        <!-- MISSION START -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5 parallax-side" style="background-image: url({{ Storage::url($mission_image->value) }})"></div>
                <div class="col-lg-7 content-side">
                    <div class="inner-content" style="padding:100px 30px 30px 30px">
                        <div class="panel-title">
                            <h5>Mission</h5>
                            <h2>{{ $mission->value }}</h2>

                        </div>
                    </div>
                </div>
            </div>
            <!--MISSION END -->

            <!-- LATEST NEWS START -->
            <div class="container">
                <div class="section-title">
                    <h2>Latest Insights</h2>
                    <p>We specialise in intelligent & effective Search and believes in the power of partnerships to grow business.</p>
                </div>
                <div class="news-carousel slider hover-effects image-hover">
                    @foreach($posts as $post)
                    <div class="slide">
                        <div class="blog-preview">
                            <div class="thumbnail-box">
                                <figure class="bp-thumbnail"><a href="{{ route('post',$post->slug) }}"><img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}"></a></figure>
                            </div>
                            <div class="bp-caption">
                                <h3>{{ $post->title }}</h3>
                                <p>{{ $post->subtitle }}</p>
                                <h5><a href="{{ route('post',$post->slug) }}">Read More</a></h5>
                            </div>
                        </div>
                    </div>
                        @endforeach
                </div>
                <div class="btn-more" style="text-align: center;">
                    <a class="btn btn-custom" href="{{ url('blog') }}" role="button">More Insights...</a>
                </div>
            </div>
            <!-- LATEST NEWS END -->

            <!-- CLIENTS START -->
            <div class="container-fluid clients-wide-section">
                <div class="container">
                    <div class="clients-carousel slider">
                        @foreach($brands as $brand)
                        <div class="slide">
                            <figure class="clients-logo" title="{{ $brand->name }}"><img src="{{ Storage::url($brand->logo) }}" alt=""></figure>
                        </div>
                            @endforeach
                    </div>
                </div>
            </div>
            <!-- CLIENTS END -->

    </section>
@endsection



