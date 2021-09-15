@extends('website/layouts/app')


@section('meta')
    <title>PAN AFRICAN CHEMICALS - Products</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1"/>
    <meta name="author" content="Pan Africa Chemicals">
    <!-- description -->
    <meta name="title" content="Pan Africa Chemicals">
    <meta name="description" content="Our products list">
    <meta name="google" content="nositelinkssearchbox"/>
    <!-- keywords -->
    {{--    <meta name="keywords" content="{{ $seo->keywords }}">--}}
    {{--    <meta name="language" content="{{ $seo->language }}">--}}
    {{--    <meta name="revisit-after" content="{{ $seo->revisit_after }}">--}}
    <style>
        .project-sidebar h3 {
            font-size: 15px;
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
                <h1><span>Our products</span></h1>
                <p><a href="{{ url('/') }}">Home</a> &nbsp; &gt; &nbsp; <a href="#">Products</a></p>
            </div>
        </div>
    </div>

    <!-- CONTENT START -->
    <section style="">
        <div class="container" style="margin-top:50px">
            <div class="row">

                <!-- SIDEBAR START -->
                <div class="order-last order-md-3 col-lg-4  col-xl-3 space-break">
                    <div class="sidebar-list">
                        <div class="list-group">
                            <a id="all" href="#container"
                               class="list-group-item d-flex justify-content-between align-items-center">
                                All
                                <span class="badge"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            @foreach($categories as $category)
                                <a id="{{ $category->slug }}" href="#container"
                                   class="list-group-item d-flex justify-content-between align-items-center productPointer">
                                    {{ $category->name }}
                                    <span class="badge"><i class="fas fa-chevron-right"></i></span>
                                </a>
                            @endforeach
                        </div>
                    </div>

                </div>
                <!-- SIDEBAR END -->

                <!-- PROJECT CONTENT START -->
                <div class="order-first order-md-9 col-lg-8 col-xl-9">

                    <div id="solution-content" class="solution-content">
                        <h2 id="chemical-group-title">ALL</h2>

                        @foreach($chemicals as $chemical)
                            <div class="row myContainer">

                                <div class="col-lg-4 space-break theProduct" style="display:none"
                                     data-cat="{{ $chemical->chemical_category->slug }}">
                                    <div class="project-sidebar">
                                        <h3>{{ $chemical->product }}</h3>
                                        <p><strong>Specification:</strong><br> {{ $chemical->specification }}</p>
                                        <p><strong>Packaging:</strong><br> {{ $chemical->packaging }}</p>
                                        <p><strong>CAS NO:</strong><br> {{ $chemical->cas }}</p>

                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>

                </div>
                <!-- PROJECT CONTENT END -->
            </div>
        </div>
    </section>
    <!-- CONTENT START -->

@section('footerSection')
    <script>
        $(document).ready(function () {
            var myContainer = $('.myContainer');
            myContainer.children().show();
            //  $('#demo').data('stuff')

            $('#all').on("click", function () {
                myContainer.children().show();
                $('#chemical-group-title').text("All");
            });

            $('.productPointer').on("click", function () {
                //the cartegory to display

                var chosenCat = $(this).attr('id');
                $('#chemical-group-title').text(chosenCat);

                if (myContainer.children().not('*[data-cat=' + chosenCat + ']')) {
                    myContainer.children().not('*[data-cat=' + chosenCat + ']').hide();
                    $('*[data-cat=' + chosenCat + ']').show();
                }

            });


        });
    </script>
@endsection
@endsection



