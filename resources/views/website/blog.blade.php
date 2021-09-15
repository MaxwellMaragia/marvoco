@extends('website/layouts/app')


@section('meta')
    <title>Pan Africa Chemicals - Blog</title>
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
    <div class="sections">
        <div class="container">
            <div class="pages-title">
                <h1>Pan African Chemicals <br> <span>Insights</span></h1>
                <p><a href="{{ url('/') }}">Home</a> &nbsp; > &nbsp; <a href="#">Insights</a></p>
            </div>
        </div>
    </div>

    <!-- CONTENT START -->
    <section>
        <div class="container">
            <!-- BLOG GRID START -->
            <div class="row">
                @foreach($posts as $post)
                <div class="col-md-6 col-lg-6">
                    <div class="post-preview">
                        <figure class="post-preview-img"><a href="{{ route('post',$post->slug) }}"><img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}"></a></figure>
                        <div class="pp-caption">
                            <h3><a href="{{ route('post',$post->slug) }}">The industrial sector is revolutionizing</a></h3>
                            <p>{{ $post->subtitle }}</p>
                            <h4 class="link"><a href="{{ route('post',$post->slug) }}">Read More</a></h4>
                            <hr class="post">
                            <div class="pp-bottom">
                                <div class="post-social">
                                    <p>{{ $post->created_at->toFormattedDateString() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    @endforeach
            </div>
            <div class="site-pagination">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">

                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- BLOG GRID END -->
    </section>
    <!-- CONTENT START -->


@endsection



