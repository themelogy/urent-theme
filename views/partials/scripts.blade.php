<noscript id="deferred-styles">
    <!-- CSS Global -->
    {!! Theme::style('vendor/bootstrap/css/bootstrap.min.css') !!}
    {!! Theme::style('vendor/fontawesome/css/font-awesome.css') !!}
    {!! Theme::style('vendor/swiper/dist/css/swiper.min.css') !!}
    {!! Theme::style('css/custom-icons.css') !!}
    <link rel="stylesheet" href="{{ mix('/themes/urent/css/theme.css') }}">
    {!! Theme::style('vendor/animate/animate.min.css') !!}
    {!! Theme::style('vendor/datetimepicker/css/bootstrap-datetimepicker.min.css') !!}
    {!! Theme::style('vendor/prettyphoto/css/prettyPhoto.css') !!}
    {!! Theme::style('vendor/bootstrap-select/css/bootstrap-select.min.css') !!}
    {!! Theme::style('vendor/owl-carousel2/assets/owl.carousel.min.css') !!}
    {!! Theme::style('vendor/owl-carousel2/assets/owl.theme.default.min.css') !!}
    @stack('css-stack')
    {!! Asset::css() !!}
</noscript>

<!-- Head Libs -->
{!! Theme::script('vendor/jquery/jquery-1.11.1.min.js') !!}
{!! Theme::script('vendor/modernizr.custom.js', ['defer']) !!}


<!--[if lt IE 9]>
{!! Theme::script('vendor/html5shiv.js', ['defer']) !!}
{!! Theme::script('vendor/respond.min.js', ['defer']) !!}
<![endif]-->

{!! Theme::script('vendor/jquery.sticky.min.js', ['defer']) !!}
{!! Theme::script('vendor/jquery.easing.min.js', ['defer']) !!}
{!! Theme::script('vendor/jquery.smoothscroll.min.js', ['defer']) !!}
{!! Theme::script('vendor/jquery.unveil.min.js', ['defer']) !!}
{!! Theme::script('vendor/superfish/js/superfish.min.js', ['defer']) !!}
{!! Theme::script('vendor/owl-carousel2/owl.carousel.min.js', ['defer']) !!}

<!-- JS Global -->
{!! Theme::script('vendor/bootstrap/js/bootstrap.min.js', ['defer']) !!}
{!! Theme::script('vendor/bootstrap-select/js/bootstrap-select.min.js', ['defer']) !!}
{!! Theme::script('vendor/datetimepicker/js/moment-with-locales.min.js', ['defer']) !!}
{!! Theme::script('vendor/datetimepicker/js/bootstrap-datetimepicker.min.js', ['defer']) !!}
{!! Theme::script('vendor/prettyphoto/js/jquery.prettyPhoto.js', ['defer']) !!}
{!! Theme::script('vendor/swiper/dist/js/swiper.min.js', ['defer']) !!}



@stack('js-stack')
{!! Asset::js('footer') !!}

<script src="{{ mix('/themes/urent/js/theme.min.js') }}"></script>
@stack('js_inline')
@stack('js-inline')

<?php if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false): ?>
{!! $googleAnalytics !!}
<?php endif; ?>