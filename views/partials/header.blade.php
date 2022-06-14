<header class="header fixed">
    <div class="header-wrapper">
        <div class="container">

            <!-- Logo -->
            <div class="logo">
                <a href="{{ url(locale()) }}"><img src="{{ Theme::url('img/logo/logo.svg') }}" alt="{{ setting('theme::company-name') }}"/></a>
            </div>
            <!-- /Logo -->

            <!-- Mobile menu toggle button -->
            <a rel="nofollow" href="#" class="menu-toggle btn ripple-effect btn-theme-transparent"><i class="fa fa-bars"></i></a>
            <!-- /Mobile menu toggle button -->

            <!-- Navigation -->
            <nav class="navigation closed clearfix">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <!-- navigation menu -->
                        <a rel="nofollow" href="#" class="menu-toggle-close btn"><i class="fa fa-times"></i></a>
                        {!! Menu::render('header', \Themes\Rentacar\Presenter\HeaderMenuPresenter::class) !!}
                        <!-- /navigation menu -->
                    </div>
                </div>
                <!-- Add Scroll Bar -->
                <div class="swiper-scrollbar"></div>
            </nav>
            <!-- /Navigation -->

        </div>
    </div>

</header>