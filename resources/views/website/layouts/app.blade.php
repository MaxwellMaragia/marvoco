<!doctype html>
<html class="no-js" lang="en">
<head>
    @include('website/layouts/head')
    @section('meta')
    @show
</head>
<body>
    @include('website/layouts/nav')
        @section('main-content')
        @show
    @include('website/layouts/footer')
</body>
</html>

