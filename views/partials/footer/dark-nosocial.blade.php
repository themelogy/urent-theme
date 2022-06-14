<footer class="footer-dark">
    <div class="footer-body">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="widget widget-contact">
                        <div class="logo m-bot-10">
                            <a href="{{ url(locale()) }}"><img style="min-height: 40px;" src="{!! Theme::url('img/logo/logo-d.svg') !!}" alt="{{ setting('themes::company-name') }}"/></a>
                        </div>
                        <address class="pull-left m-top-5">
                            <strong>{!! setting('theme::company-name') !!}</strong><br>
                            {!! setting('theme::address') !!}<br>
                            <abbr title="Telefon">T:</abbr> {{ setting('theme::phone') }}<br/>
                            <abbr title="Mobil">M:</abbr> {{ setting('theme::mobile') }}<br/>
                            <abbr title="Email">E:</abbr> {{ HTML::email(setting('theme::email')) }}
                        </address>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="widget widget-links">
                                <h4>Kurumsal</h4>
                                {!! Menu::render('footer-link-1', \Themes\Rentacar\Presenter\FooterMenuLinksPresenter::class) !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="widget widget-links">
                                <h4>Ankara Araç Kiralama</h4>
                                {!! Menu::render('footer-link-5', \Themes\Rentacar\Presenter\FooterMenuLinksPresenter::class) !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="widget widget-links">
                                <h4>Ankara Oto Kiralama</h4>
                                {!! Menu::render('footer-link-4', \Themes\Rentacar\Presenter\FooterMenuLinksPresenter::class) !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="widget">
                                <p>Bizi takip edin</p>
                                @include('partials.components.socials')
                                {!! Menu::render('ext-links', \Themes\Rentacar\Presenter\FooterMenuLinksPresenter::class) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-meta dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="copyright">{{ trans('themes::theme.copyrights') }}&copy; {{ setting('theme::company-name') }}</div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div id="to-top" class="to-top"><i class="fa fa-angle-up"></i></div>

@push('css_inline')
<style>
.footer-dark .widget-links ul li {
	margin-bottom: 5px !important;
	line-height:16px !important;
	list-style-type: circle;
	list-style-position: outside;
}
</style>
@endpush