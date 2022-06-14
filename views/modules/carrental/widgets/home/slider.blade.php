<section class="page-section">
    <div class="container">

        <h2 class="section-title">
            <small>{{ trans('themes::theme.car.slider title') }}</small>
            <span>{{ trans('themes::theme.car.slider sub title') }}</span>
        </h2>

        <div class="tabs">
            <ul id="tabs" class="nav">
                @foreach($classes as $class)
                    @if($cars[$class->id]->count()>0)
                    <li class="@if($loop->iteration == 1) active @endif"><a href="#tab-{{ $loop->iteration }}" data-toggle="tab">{{ $class->name }}</a></li>
                    @endif
                @endforeach
            </ul>
        </div>

        <div class="tab-content">
        @foreach($classes as $class)
            @if($cars[$class->id]->count()>0)
            <!-- tab 1 -->
                <div class="tab-pane fade @if($loop->iteration == 1) active in @endif" id="tab-{{ $loop->iteration }}">

                    <div class="swiper swiper-offers-{{ $loop->iteration }}">
                        <div class="swiper-container">

                            <div class="swiper-wrapper">

                                @foreach($cars[$class->id] as $car)
                                    <div class="swiper-slide">
                                        <div class="thumbnail no-border no-padding thumbnail-car-card">
                                            <div class="media">
                                                <a class="media-link" data-gal="prettyPhoto" href="{{ $car->present()->firstImage(null,440,'resize',80) }}" style="min-height: 220px;">
                                                    <img style="width: auto; max-height: 220px;" src="{{ $car->present()->firstImage(null,220,'resize',80) }}" alt="{{ $car->title }}"/>
                                                    <span class="icon-view"><strong><i class="fa fa-search"></i></strong></span>
                                                </a>
                                            </div>
                                            <div class="caption text-center">
                                                <h4 class="caption-title"><a href="#">{{ $car->fullname }}</a></h4>
                                                <div class="caption-text">{{ trans('themes::theme.price', ['price'=>$car->prices->price6]) }}</div>
                                                <div class="buttons">
                                                    <a class="btn btn-theme" href="{{ $car->url }}">{{ trans('themes::theme.buttons.rent') }}</a>
                                                </div>
                                                <table class="table">
                                                    <tr>
                                                        <td><i class="fa fa-user"></i> {{ $car->series->person }}</td>
                                                        <td><i class="fa fa-suitcase"></i> {{ $car->series->baggage }}</td>
                                                        <td><i class="fa icon-body"></i> {{ $car->present()->body_type }}</td>
                                                        <td><i class="fa icon-fuel"></i> {{ $car->present()->fuel_type }}</td>
                                                        <td><i class="fa icon-gear"></i> {{ $car->present()->transmission }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>


                        </div>

                        <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                        <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>

                    </div>

                </div>
            @endif
            @endforeach
        </div>
    </div>
</section>

@push('js_inline')
    <script type="text/javascript">
        @foreach($classes as $class)
        var swiper_{{ $loop->iteration }} = $('.swiper-offers-{{ $loop->iteration }} .swiper-container');
        @endforeach

        jQuery(document).ready(function () {
            if ($().swiper) {
                @foreach($classes as $class)
                if (swiper_{{ $loop->iteration }}.length) {
                    swiper_{{ $loop->iteration }} = new Swiper(swiper_{{ $loop->iteration }}, {
                        direction: 'horizontal',
                        slidesPerView: 3,
                        spaceBetween: 30,
                        autoplay: 3000,
                        preventClicks: false,
                        preventClicksPropagation: false,
                        loop: true,
                        paginationClickable: true,
                        pagination: '.swiper-pagination',
                        nextButton: '.swiper-button-next',
                        prevButton: '.swiper-button-prev',
                        breakpoints: {
                            1024: {
                                slidesPerView: 3,
                                spaceBetween: 30
                            },
                            768: {
                                slidesPerView: 2,
                                spaceBetween: 30
                            },
                            640: {
                                slidesPerView: 1,
                                spaceBetween: 20
                            },
                            320: {
                                slidesPerView: 1,
                                spaceBetween: 10
                            }
                        }
                    });
                }
                @endforeach
            }
            swipeUpdater();
            if ($().owlCarousel) {
                // on tab click
                $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
                    swipeUpdater();
                });
                $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                    swipeUpdater();
                });
            }
        });

        function swipeUpdater() {
            // refresh swiper slider
            if ($().swiper) {
                @foreach($classes as $class)
                if (typeof(swiper_{{ $loop->iteration }}.length) == 'undefined') {
                    swiper_{{ $loop->iteration }}.update();
                    swiper_{{ $loop->iteration }}.onResize();
                    if ($(window).width() > 991) {
                        swiper_{{ $loop->iteration }}.params.slidesPerView = 3;
                    }
                    else {
                        if ($(window).width() < 768) {
                            swiper_{{ $loop->iteration }}.params.slidesPerView = 1;
                        }
                        else {
                            swiper_{{ $loop->iteration }}.params.slidesPerView = 2;
                        }
                    }
                }
                @endforeach
            }
        }

        jQuery(window).load(function () {
            swipeUpdater();
        });
    </script>
@endpush