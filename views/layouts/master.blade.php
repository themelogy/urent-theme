<!DOCTYPE html>
<html lang="{!! LaravelLocalization::getCurrentLocale() !!}">
<head>
@include('partials.metadata')
</head>
<body id="home" class="wide">
<div id="preloader">
    <div id="preloader-status">
        <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
        <div id="preloader-title">Yükleniyor</div>
    </div>
</div>
<div class="wrapper">

    @include('partials.header')

    <div class="content-area">

        @yield('breadcrumbs')

        @yield('content')

    </div>

    @include('partials.footer.dark')

</div>

@include('partials.scripts')

</body>
</html>