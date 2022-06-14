@extends('layouts.master')

@section('breadcrumbs')
    <section class="page-section breadcrumbs text-right">
        <div class="container">
            <div class="page-header">
                <h1>{{ trans('themes::carrental.titles.reservation car', ['car'=>$car->fullname]) }}</h1>
            </div>
            {!! Breadcrumbs::renderIfExists('carrental.complete') !!}
        </div>
    </section>
@endsection

@section('content')

    <section class="page-section with-sidebar sub-page">
        <div class="container">
            <div class="row">
                <aside class="col-md-4 sidebar" id="sidebar">
                    <!-- widget detail reservation -->
                    <div class="widget shadow widget-find-car">
                        <h4 class="widget-title">Araç Bilgileri</h4>
                        @include('carrental::partials.reservation-details')
                    </div>

                </aside>
                <div class="col-md-8 content" id="content">
                    <div class="order-done">
                        <i class="icon-checked"><img src="{{ Theme::url('images/icon-checked.png') }}" alt=""></i>
                        @if(Session::has('success'))
                            <h4>{{ Session::get('success') }}</h4>
                        @endif
                        <hr>
                        <h4>Rezervasyon Bilgileri</h4>
                        <ul class="row list-unstyled">
                            <li class="col-md-6">
                                <h6>Rezervasyon Tarihleri</h6>
                                <p>Alış Tarihi <span>{{ $reservation->pick_at->formatLocalized('%d %B %Y') }} {{ $reservation->pick_at->format('H:i') }}</span>
                                </p>
                                <p>Dönüş Tarihi <span>{{ $reservation->drop_at->formatLocalized('%d %B %Y') }} {{ $reservation->drop_at->format('H:i') }}</span>
                                </p>
                                <p>Toplam <span>{{ $reservation->total_day }} gün</span>
                                </p>
                            </li>
                            <li class="col-md-6">
                                <h6>Alış/Dönüş Lokasyonu</h6>
                                <p>Alış Lokasyonu <span>{{ $reservation->present()->start_location }}</span>
                                </p>
                                <p>Dönüş Lokasyonu <span>{{ $reservation->present()->return_location }}</span>
                                </p>
                            </li>
                            <li class="col-md-6">
                                <h6>Araç</h6>
                                <p>{!! $car->brand->present()->logo(40).' '.$car->fullname !!} <span>{{ $car->present()->price }} TL</span>
                                </p>
                                <p>{{ $car->carclass->name }}</p>
                            </li>
                            <li class="col-md-6">
                                <h6>Toplam (KDV Hariç)</h6>
                                <p><span>{{ $car->present()->total_price }}</span>
                                </p>
                            </li>
                            <li class="col-md-12">
                                <h6>Kimlik Bilgileri</h6>
                                <p>{{ $reservation->fullname }}
                                    <br>{{ $reservation->tc_no }}
                                    <br>{{ $reservation->phone }}
                                    <br>{{ $reservation->mobile_phone }}
                                    <br>{{ $reservation->email }}
                                    <br>{{ $reservation->requests }}
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

@push('js_inline')
    {!! Captcha::script() !!}
@endpush