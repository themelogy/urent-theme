@if(Module::active('Carrental'))
    <section class="page-section no-padding slider">
        <div class="container full-width">

            <div class="main-slider">
                <div>
                    {!! Form::open(['route' => 'carrental.index', 'method' => 'post']) !!}
                    <!-- Slide 2 -->
                    <div class="item slide1 otogar" style="background-image: url({{ $slides[0]->present()->firstImage(null,700,'resize',80) }})">
                        <div class="caption">
                            <div class="container">
                                <div class="div-table">
                                    <div class="div-cell">
                                        <div class="caption-content">
                                            <h3 class="caption-subtitle" style="text-transform: revert; font-weight: 300;">{!! trans('themes::theme.reservation.slogan2') !!}</h3>
                                            <!-- Search form -->
                                            <div class="row">
                                                <div class="col-sm-12 col-md-10 col-md-offset-1">

                                                    <div class="form-search dark">

                                                        <div class="form-title">
                                                            <i class="fa fa-globe"></i>
                                                            <h2>{{ trans('themes::theme.reservation.slogan1') }}</h2>
                                                        </div>

                                                        <div class="row row-inputs">
                                                            <div class="container-fluid">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group has-icon has-label">
                                                                        <label for="formSearchUpLocation">{{ trans('themes::theme.reservation.start location') }}</label>
                                                                        {!! Form::select('start_location', CarLocationRepository::all()->pluck('name', 'id'),null,['class'=>'selectpicker', 'data-live-search'=>'true', 'data-width'=>'100%', 'data-toggle'=>'tooltip', 'title'=>'select']) !!}
                                                                        <span class="form-control-icon"><i class="fa fa-map-marker"></i></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div class="form-group has-icon has-label">
                                                                        <label for="formSearchUpDate">{{ trans('themes::theme.reservation.pickup date') }}</label>
                                                                        {!! Form::text('pick_at', Carbon::today()->format('d.m.Y'), ['id'=>'pick_at', 'placeholder'=>Carbon::today()->format('d.m.Y'), 'class'=>'form-control']) !!}
                                                                        <span class="form-control-icon"><i class="fa fa-calendar"></i></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div class="form-group has-icon has-label selectpicker-wrapper">
                                                                        <label>{{ trans('themes::theme.reservation.pickup hour') }}</label>
                                                                        {!! Form::selectHours('pick_hour', '00:00', '23:30', '09:00', ['class'=>'selectpicker', 'data-live-search'=>'true', 'data-width'=>'100%', 'data-toggle'=>'tooltip', 'title'=>'select']) !!}
                                                                        <span class="form-control-icon"><i class="fa fa-clock-o"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row row-inputs">
                                                            <div class="container-fluid">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group has-icon has-label">
                                                                        <label for="formSearchOffLocation">{{ trans('themes::theme.reservation.return location') }}</label>
                                                                        {!! Form::select('return_location', CarLocationRepository::all()->pluck('name', 'id'),null,['class'=>'selectpicker', 'data-live-search'=>'true', 'data-width'=>'100%', 'data-toggle'=>'tooltip', 'title'=>'select']) !!}
                                                                        <span class="form-control-icon"><i class="fa fa-map-marker"></i></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div class="form-group has-icon has-label">
                                                                        <label for="formSearchOffDate">{{ trans('themes::theme.reservation.drop date') }}</label>
                                                                        {!! Form::text('drop_at', Carbon::tomorrow()->format('d.m.Y'), ['id'=>'drop_at', 'placeholder'=>Carbon::tomorrow()->format('d.m.Y'),'class'=>'form-control']) !!}
                                                                        <span class="form-control-icon"><i class="fa fa-calendar"></i></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div class="form-group has-icon has-label selectpicker-wrapper">
                                                                        <label>{{ trans('themes::theme.reservation.drop hour') }}</label>
                                                                        {!! Form::selectHours('drop_hour', '00:00', '23:30', '09:00', ['class'=>'selectpicker', 'data-live-search'=>'true', 'data-width'=>'100%', 'data-toggle'=>'tooltip', 'title'=>'select']) !!}
                                                                        <span class="form-control-icon"><i class="fa fa-clock-o"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row row-submit">
                                                            <div class="container-fluid">
                                                                <div class="inner">
                                                                    <i class="fa fa-plus-circle"></i> <a href="#"></a>
                                                                    {!! Form::submit(trans('themes::theme.buttons.see all vehicles'), ['class'=>'btn btn-submit btn-theme pull-right']) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- /Search form -->
                                            <span class="home caption-title m-top-30">{{ trans('themes::theme.reservation.call now') }} <b>{!! setting('theme::phone') !!}</b></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Slide 2 -->
                    {!! Form::close() !!}


                </div>
            </div>

        </div>
    </section>
    @push('js_inline')
        <script>
            jQuery(document).ready(function () {
                var mainSlider = $('#main-slider');
                // Main slider
                if (mainSlider.length) {
                    mainSlider.owlCarousel({
                        //items: 1,
                        autoplay: false,
                        autoplayHoverPause: true,
                        loop: true,
                        margin: 0,
                        dots: true,
                        nav: true,
                        navText: [
                            "<i class='fa fa-angle-left'></i>",
                            "<i class='fa fa-angle-right'></i>"
                        ],
                        responsiveRefreshRate: 100,
                        responsive: {
                            0: {items: 1},
                            479: {items: 1},
                            768: {items: 1},
                            991: {items: 2},
                            1024: {items: 3}
                        }
                    });
                }
                $('#pick_at').datetimepicker({
                    format: 'DD.MM.YYYY',
                    locale: '{{ locale() }}',
                    minDate: '{{ Carbon::today()->format('Y/m/d') }}'
                });
                $('#drop_at').datetimepicker({
                    format: 'DD.MM.YYYY',
                    locale: '{{ locale() }}',
                    useCurrent: false
                });
                $("#pick_at").on("dp.change", function (e) {
                    $('#drop_at').data("DateTimePicker").minDate(e.date);
                });
                $("#drop_at").on("dp.change", function (e) {
                    $('#pick_at').data("DateTimePicker").maxDate(e.date);
                });
            });
        </script>
    @endpush
@endif