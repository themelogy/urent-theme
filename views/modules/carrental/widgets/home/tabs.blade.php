@if(Module::active('Carrental'))
    @php $classes = CarClassRepository::all()->sortBy('ordering')->take(6) @endphp
    <section class="page-section">
        <div class="container">

            <h2 class="section-title wow fadeInUp" data-wow-offset="70" data-wow-delay="500ms">
                <small>{{ trans('themes::theme.car.slider title') }}</small>
                <span>{{ trans('themes::theme.car.slider sub title') }}</span>
            </h2>

            <div class="tabs awesome wow fadeInUp" data-wow-offset="70" data-wow-delay="500ms">
                <ul id="tabs1" class="nav">
                    @foreach($classes as $class)
                        <li class="@if($loop->iteration == 1) active @endif"><a href="#tab-cl{{ $loop->iteration }}" data-toggle="tab">{{ $class->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="tab-content wow fadeInUp" data-wow-offset="70" data-wow-delay="500ms">

                @foreach($classes as $class)
                    @php $cars = $class->cars()->with(['brand', 'model', 'series'])->whereAvailableStatus(\Modules\Carrental\Entities\Car\AvailableStatuses::READY)->whereStatus(\Modules\Carrental\Entities\Helpers\Status::PUBLISHED)->get()->take(6) @endphp
                    <div class="tab-pane fade @if($loop->iteration == 1) active in @endif" id="tab-cl{{ $loop->iteration }}">
                        <div class="car-big-card">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="tabs awesome-sub">
                                        <ul id="tabs4" class="nav">
                                            @foreach($cars as $car)
                                                <li class="@if($loop->iteration == 1) active @endif"><a href="#tab-cl{{ $class->id }}c{{ $loop->iteration }}" data-toggle="tab">{{ $car->fullname }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-9">

                                    <!-- Sub tabs content -->
                                    <div class="tab-content">
                                        <div class="tab-content">
                                            @foreach($cars as $car)
                                                <div class="tab-pane fade @if($loop->iteration == 1) active in @endif" id="tab-cl{{ $class->id }}c{{ $loop->iteration }}">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <!-- Swiper -->
                                                            <div class="swiper-container" id="swiperSlider1x2">
                                                                <div class="swiper-wrapper">
                                                                    <div class="swiper-slide">
                                                                        <a href="{{ $car->present()->firstImage(600,null,'resize',80) }}" data-gal="prettyPhoto"><img class="img-responsive" src="{{ $car->present()->firstImage(600,null,'resize',80) }}" alt=""/></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="car-details">
                                                                <div class="price">
                                                                    <strong>{{ $car->prices->price1 }}</strong> <span>{!! trans("themes::carrental.price day") !!}</span> <i class="fa fa-info-circle"></i>
                                                                </div>
                                                                <div class="list">
                                                                    <ul>
                                                                        <li><i class="fa fa-user"></i> {{ $car->series->person }} </li>
                                                                        <li><i class="fa fa-suitcase"></i> {{ $car->series->baggage }}</li>
                                                                        <li><i class="fa icon-gear"></i> {{ $car->present()->transmission }}</li>
                                                                        <li><i class="fa icon-body"></i> {{ $car->present()->body_type }}</li>
                                                                        <li><i class="fa icon-fuel"></i> {{ $car->present()->fuel_type }}</li></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="button">
                                                                    <a href="{{ $car->url }}" class="btn btn-theme ripple-effect btn-theme-dark btn-block">{{ trans('themes::theme.buttons.rent') }}</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                    <!-- /Sub tabs content -->

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
@endif