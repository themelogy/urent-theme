@extends('layouts.master')

@section('breadcrumbs')
    <!-- BREADCRUMBS -->
    <section class="page-section breadcrumbs text-right">
        <div class="container">
            <div class="page-header">
                <h1>{{ trans('themes::theme.price lists') }}</h1>
            </div>
            {!! Breadcrumbs::renderIfExists('carrental.prices') !!}
        </div>
    </section>
    <!-- /BREADCRUMBS -->
@endsection

@section('content')
    <!-- PAGE -->
    <section class="page-section color">
        <div class="container">
            <div class="col-md-12">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>{{ trans('carrental::cars.title.car') }}</th>
                        <th>{{ trans('carrental::cars.form.price1') }}</th>
                        <th>{{ trans('carrental::cars.form.price2') }}</th>
                        <th>{{ trans('carrental::cars.form.price3') }}</th>
                        <th>{{ trans('carrental::cars.form.price4') }}</th>
                        <th>{{ trans('carrental::cars.form.price5') }}</th>
                        <th>{{ trans('carrental::cars.form.price6') }}</th>
                        <th>{{ trans('carrental::cars.button.reservation') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cars as $car)
                    <tr>
                        <td>{{ $car->fullname }}</td>
                        <td>{{ $car->prices->price1 }}</td>
                        <td>{{ $car->prices->price2 }}</td>
                        <td>{{ $car->prices->price3 }}</td>
                        <td>{{ $car->prices->price4 }}</td>
                        <td>{{ $car->prices->price5 }}</td>
                        <td>{{ $car->prices->price6 }}</td>
                        <td><a class="btn btn-default btn-sm" href="{{ url(route('carrental.reservation').'?car_id='.$car->id) }}">{{ trans('carrental::cars.button.reservation') }}</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- /PAGE -->
@stop
