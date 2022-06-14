@extends('layouts.master')

@section('breadcrumbs')
    <!-- BREADCRUMBS -->
    <section class="page-section breadcrumbs text-right">
        <div class="container">
            <div class="page-header">
                <h1>{{ trans('themes::theme.rental cars') }}</h1>
            </div>
            {!! Breadcrumbs::renderIfExists('carrental.index') !!}
        </div>
    </section>
    <!-- /BREADCRUMBS -->
@endsection

@section('content')
    <section class="page-section with-sidebar sub-page">
        <div class="container">
            <div class="row">
                <!-- CONTENT -->
                <div class="col-md-8 content car-listing" id="content">

                    @foreach($cars as $car)
                        <div class="thumbnail no-border no-padding thumbnail-car-card clearfix">
                            <div class="media" style="min-width: 360px;">
                                <a class="media-link" data-gal="prettyPhoto" href="{{ $car->present()->firstImage(740,440,'fit',80) }}">
                                    <img src="{{ $car->present()->firstImage(null,180,'resize',80) }}" alt="{{ $car->fullname }}"/>
                                    <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
                                </a>
                            </div>
                            <div class="caption">
                                <h4 class="caption-title"><a href="#">{{ $car->fullname }}</a></h4>
                                <h5 class="caption-title-sub">{{ trans('themes::theme.price', ['price'=>$car->prices->price6]) }}</h5>
                                <div class="caption-text">
                                    <span class="booking-item-price">{{ $car->present()->price }}</span> <span>TL/gün</span>
                                    @isset($reservation->total_day)
                                        <p>{{ $reservation->total_day }} Gün - {{ $car->present()->total_price }}</p>
                                    @endisset
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="meta">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <tr>
                                            <td><i class="fa fa-user"></i> {{ $car->series->person }}</td>
                                            <td><i class="fa fa-suitcase"></i> {{ $car->series->baggage }}</td>
                                            <td><i class="fa icon-body"></i> {{ $car->present()->body_type }}</td>
                                            <td><i class="fa icon-fuel"></i> {{ $car->present()->fuel_type }}</td>
                                            <td><i class="fa icon-gear"></i> {{ $car->present()->transmission }}</td>
                                            <td class="buttons">
                                                <a style="text-transform: uppercase; font-weight: bold;" class="btn btn-theme" href="{{ $car->url }}">{{ trans('themes::theme.buttons.rent') }}</a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                @endforeach

                <!-- Pagination -->
                    <div class="pagination-wrapper">
                        @if(count($cars)>0)
                            {!! $cars->render('carrental::pagination.default') !!}
                        @endif
                    </div>
                    <!-- /Pagination -->

                </div>
                <!-- /CONTENT -->

                <!-- SIDEBAR -->
                <aside class="col-md-4 sidebar" id="sidebar">
                    <!-- widget -->
                    <div class="widget shadow widget-find-car">
                        <h4 class="widget-title">{{ trans('themes::theme.reservation.date') }}</h4>
                        <div class="widget-content">
                            <!-- Search form -->
                            <div class="form-search light">
                                @include('carrental::partials.reservation-date-index')
                            </div>
                            <!-- /Search form -->
                        </div>
                    </div>
                    <!-- /widget -->

                    <!-- widget helping center -->
                    <div class="widget shadow widget-helping-center">
                        @carClasses('sidebar.classes')
                    </div>
                    <!-- /widget helping center -->
                </aside>
                <!-- /SIDEBAR -->

            </div>
        </div>
    </section>
@endsection