@extends('website/layouts/app')


@section('meta')
    <title>Pan Africa Chemicals - Contacts</title>
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
    <style>
        .ab-caption h4 {
            color: white
        }

        .ab-caption p {
            color: white
        }

        .og-about h2 {
            font-size: 34.2px;
        }
    </style>
@endsection


@section('main-content')
    <!-- LOADER -->
    <div id="loader-wrapper">
        <div id="loader"></div>
    </div>
    <!-- LOADER -->
    <div class="sections" style="height:300px" id="container">
        <div class="container">
            <div class="pages-title">
                <h1><span>Contact Us</span></h1>
                <p><a href="{{ url('/') }}">Home</a> &nbsp; &gt; &nbsp; <a href="#">Contact Us</a></p>
            </div>
        </div>
    </div>

    <!-- CONTENT START -->
    <div class="container-multisection">

        <div class="row cm-bottom">

            <div class="col-lg-4 span-about">
                <div class="sa-content">
                    <div class="sa-tittle">
                        <h5>PAC</h5>
                        <h2>Nairobi office contacts</h2>
                    </div>


                    <div class="footer-icon">
                        <div class="span-fi">
                            <div class="fi-fas"><i class="fas fa-map-marker"></i></div>
                            <div class="fi-caption">
                                <p>{{ $nairobi_address->value }}</p>
                            </div>
                        </div>

                        <div class="span-fi">
                            <div class="fi-fas"><i class="fas fa-envelope"></i></div>
                            <div class="fi-caption">
                                <p>{{ $nairobi_email->value }}</p>
                            </div>
                        </div>
                        <div class="span-fi">
                            <div class="fi-fas"><i class="fas fa-phone"></i></div>
                            <div class="fi-caption">
                                <p>Tel: {{ $nairobi_tel->value }}</p>
                            </div>
                        </div>
                        <div class="span-fi">
                            <div class="fi-caption">
                                <p>Mobile: {{ $nairobi_mobile_1->value }}, {{ $nairobi_mobile_2->value }}, {{ $nairobi_mobile_3->value }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-8 testimonial-side">
                <div class="container" style="margin:0">
                    <div class="map">
                        <iframe
                            src="{{ $nairobi_map->value }}"
                            class="map-iframe"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 testimonial-side">
                <div class="container" style="margin:0">
                    <div class="map">
                        <iframe
                            src="{{ $webuye_map->value }}"
                            class="map-iframe"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 span-about">
                <div class="sa-content">
                    <div class="sa-tittle">
                        <h5>PAC</h5>
                        <h2>Webuye Factory contacts</h2>
                    </div>


                    <div class="footer-icon">
                        <div class="span-fi">
                            <div class="fi-fas"><i class="fas fa-map-marker"></i></div>
                            <div class="fi-caption">
                                <p>{{ $webuye_address->value }}</p>
                            </div>
                        </div>

                        <div class="span-fi">
                            <div class="fi-fas"><i class="fas fa-envelope"></i></div>
                            <div class="fi-caption">
                                <p>{{ $webuye_email->value }}</p>
                            </div>
                        </div>
                        <div class="span-fi">
                            <div class="fi-fas"><i class="fas fa-phone"></i></div>
                            <div class="fi-caption">
                                <p>Tel:  {{ $webuye_tel->value }}</p>
                            </div>
                        </div>
                        <div class="span-fi">
                            <div class="fi-fas"><i class="fas fa-phone"></i></div>
                            <div class="fi-caption">
                                <p>Mobile: {{ $webuye_mobile_1->value }}, {{ $webuye_mobile_2->value }}, {{ $webuye_mobile_3->value }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT START -->

@endsection



