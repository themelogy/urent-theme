@extends('layouts.master')

@section('breadcrumbs')
    <section class="page-section breadcrumbs text-right">
        <div class="container">
            <div class="page-header">
                <h1>{{ trans('themes::carrental.titles.car', ['car'=>$car->fullname]) }}</h1>
            </div>
            {!! Breadcrumbs::renderIfExists('carrental.car') !!}
        </div>
    </section>
@endsection

@section('content')

    <section class="page-section with-sidebar sub-page">
        <div class="container">
            <div class="row">
                <div class="col-md-8 content" id="content">
                    <div class="car-big-card alt thumbnail no-border no-padding thumbnail-car-card clearfix">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="@if(count($car->images)>1) owl-carousel img-carousel @endif">
                                    @foreach($car->present()->images(800,null,'resize',80,6) as $image)
                                        <div class="item">
                                            <a class="btn btn-zoom" href="{{ $image }}" data-gal="prettyPhoto"><i class="fa fa-arrows-h"></i></a>
                                            <a href="{{ $image }}" data-gal="prettyPhoto"><img class="img-responsive" src="{{ $image }}" alt=""/></a>
                                        </div>
                                    @endforeach
                                </div>
                                @if(count($car->images)>1)
                                    <div class="row car-thumbnails">
                                        @foreach($car->present()->images(70,70,'fit',80,6) as $image)
                                            <div class="col-xs-2 col-sm-2 col-md-{{ 12/$loop->count }}"><a href="#" onclick="jQuery('.img-carousel').trigger('to.owl.carousel', [{{ $loop->iteration-1 }},300]);"><img src="{{ $image }}" alt=""/></a></div>
                                        @endforeach
                                    </div>
                                @endif
                                <div class="meta">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
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
                        </div>
                    </div>

                    <hr class="page-divider half transparent"/>

                    <div class="row">
                        <div class="col-md-12">
                            <p style="text-align: justify;">??irketimiz filosuna kat??lm???? olan 0 km {{ $car->present()->fullname }} ara??lar??m??z hizmetinize haz??r durumdad??r. Yak??t konusunda olduk??a tasarruf sa??layan Kiral??k {{ $car->present()->fullname }} konforu ve yol tutu??u ilede siz de??erli m????terilerimize rahat bir s??r???? keyfi i??in bir telefon kadar uzakta! Ankara oto kiralama sekt??r??nde bu arac?? en uygun fiyata {{ setting('theme::company-name') }} g??vencesi ile temin edebilirsiniz.</p>
                        </div>
                    </div>

                </div>


                <aside class="col-md-4 sidebar" id="sidebar">
                    <!-- widget detail reservation -->
                    <div class="widget shadow widget-find-car">
                        <h4 class="widget-title">Rezervasyon Tarihi</h4>
                        <div class="widget-content">
                            <!-- Search form -->
                            <div class="form-search light">
                                @include('carrental::partials.reservation-date', ['button'=>'Rezervasyon'])
                            </div>
                            <!-- /Search form -->
                        </div>
                    </div>

                </aside>

            </div>
        </div>
    </section>

@endsection