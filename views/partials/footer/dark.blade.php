<footer class="footer-dark">
    <div class="footer-body">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="widget widget-contact">
                        <div class="logo m-bot-10">
                            <a href="{{ url(locale()) }}"><img src="{!! Theme::url('img/logo/logo.svg') !!}" alt="{{ setting('themes::company-name') }}"/></a>
                        </div>
                        <address class="pull-left m-top-5 p-lft-40">
                            <strong>{!! setting('theme::company-name') !!}</strong><br>
                            {!! setting('theme::address') !!}<br>
                            <abbr title="Telefon">T:</abbr> {{ setting('theme::phone') }}<br/>
                            <abbr title="Mobil">M:</abbr> {{ setting('theme::phone2') }}<br/>
                            <abbr title="Email">E:</abbr> {{ HTML::email(setting('theme::email')) }}
                        </address>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="widget widget-links">
                                <h4>KURUMSAL</h4>
                                {!! Menu::render('corporate', \Themes\Rentacar\Presenter\FooterMenuLinksPresenter::class) !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="widget widget-links">
                                <h4>HİZMETLERİMİZ</h4>
                                {!! Menu::render('services', \Themes\Rentacar\Presenter\FooterMenuLinksPresenter::class) !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="widget widget-links">
                                <h4>ANKARA ARAÇ KİRALAMA</h4>
                                <ul>
                                    @foreach(Blog::latest(10) as $post)
                                        <li><a href="{{ $post->url }}">{{ $post->title }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="widget widget-opening-hours">
                                <h4>Çalışma Saatleri</h4>
                                <ul>
                                    <li><i class="fa fa-clock-o"></i> <span class="m-rgt-15">Pazartesi</span> 09:00-19:00</li>
                                    <li><i class="fa fa-clock-o"></i> <span class="m-rgt-15">Salı</span> 09:00-19:00</li>
                                    <li><i class="fa fa-clock-o"></i> <span class="m-rgt-15">Çarşamba</span> 09:00-19:00</li>
                                    <li><i class="fa fa-clock-o"></i> <span class="m-rgt-15">Perşembe</span> 09:00-19:00</li>
                                    <li><i class="fa fa-clock-o"></i> <span class="m-rgt-15">Cuma</span> 09:00-19:00</li>
                                    <li><i class="fa fa-clock-o"></i> <span class="m-rgt-15">Cumartesi</span> 09:00-19:00</li>
                                    <li><i class="fa fa-clock-o"></i> <span class="m-rgt-15">Pazar</span> 10:00-14:00</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-meta">
        <div class="container">
            <div class="row">

                <div class="col-sm-12">
                    <p class="btn-row text-center">
                        <a target="_blank" rel="nofollow" href="{{ setting('theme::facebook') }}" class="btn btn-theme ripple-effect btn-icon-left facebook wow fadeInDown" data-wow-offset="20" data-wow-delay="100ms"><i class="fa fa-facebook"></i>FACEBOOK</a>
                        <a target="_blank" rel="nofollow" href="{{ setting('theme::twitter') }}" class="btn btn-theme btn-icon-left ripple-effect twitter wow fadeInDown" data-wow-offset="20" data-wow-delay="200ms"><i class="fa fa-twitter"></i>TWITTER</a>
                        <a target="_blank" rel="nofollow" href="{{ setting('theme::pinterest') }}" class="btn btn-theme btn-icon-left ripple-effect pinterest wow fadeInDown" data-wow-offset="20" data-wow-delay="300ms"><i class="fa fa-pinterest"></i>PINTEREST</a>
                        <a target="_blank" rel="nofollow" href="{{ setting('theme::google') }}" class="btn btn-theme btn-icon-left ripple-effect google wow fadeInDown" data-wow-offset="20" data-wow-delay="400ms"><i class="fa fa-google"></i>GOOGLE</a>
                    </p>
                    <div class="copyright">{{ trans('themes::theme.copyrights') }}&copy; <a href="https://www.ugmarackiralama.com.tr">Ankara Oto Kiralama</a></div>
                </div>

            </div>
        </div>
    </div>
</footer>

<div id="to-top" class="to-top"><i class="fa fa-angle-up"></i></div>