@extends('layouts.master')

@section('breadcrumbs')
    <section class="page-section breadcrumbs text-right">
        <div class="container">
            <div class="page-header">
                <h1>{{ trans('themes::carrental.titles.car', ['car'=>$car->fullname]) }}</h1>
            </div>
            {!! Breadcrumbs::renderIfExists('carrental.reservation') !!}
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

                    <h3 class="block-title alt"><i class="fa fa-angle-down"></i>Rezervasyon Bilgileri</h3>
                    @if (Session::has('success'))
                        <div class="alert alert-success fade in alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    {!! Form::open(['route'=>'carrental.reservation.create', 'method'=>'post']) !!}
                    {!! Form::hidden('car_id', Request::get('car_id')) !!}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has("tc_no") ? ' has-error' : '' }}">
                                {!! Form::text('tc_no', old('tc_no'), ['class' => 'form-control', 'data-toggle'=>'tooltip', 'placeholder'=>trans('carrental::reservations.form.tc_no')]) !!}
                                {!! $errors->first("tc_no", '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has("first_name") ? ' has-error' : '' }}">
                                {!! Form::text('first_name', old('first_name'), ['class' => 'form-control', 'data-toggle'=>'tooltip', 'placeholder'=>trans('carrental::reservations.form.first_name')]) !!}
                                {!! $errors->first("first_name", '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has("last_name") ? ' has-error' : '' }}">
                                {!! Form::text('last_name', old('last_name'), ['class' => 'form-control', 'data-toggle'=>'tooltip', 'placeholder'=>trans('carrental::reservations.form.last_name')]) !!}
                                {!! $errors->first("last_name", '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-4 m-top-10">
                            <div class="form-group{{ $errors->has("phone") ? ' has-error' : '' }}">
                                {!! Form::text('phone', old('phone'), ['class' => 'form-control', 'data-toggle'=>'tooltip', 'placeholder'=>trans('carrental::reservations.form.phone')]) !!}
                                {!! $errors->first("phone", '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-4 m-top-10">
                            <div class="form-group{{ $errors->has("mobile_phone") ? ' has-error' : '' }}">
                                {!! Form::text('mobile_phone', old('mobile_phone'), ['class' => 'form-control', 'data-toggle'=>'tooltip', 'placeholder'=>trans('carrental::reservations.form.mobile_phone')]) !!}
                                {!! $errors->first("mobile_phone", '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-4 m-top-10">
                            <div class="form-group{{ $errors->has("email") ? ' has-error' : '' }}">
                                {!! Form::text('email', old('email'), ['class' => 'form-control', 'data-toggle'=>'tooltip', 'placeholder'=>trans('carrental::reservations.form.email')]) !!}
                                {!! $errors->first("email", '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-12 m-top-10">
                            <div class="form-group">
                                {!! Form::textarea('requests', old('requests'), ['class'=>'form-control', 'data-toggle'=>'tooltip', 'placeholder'=>'İstekleriniz', 'rows'=>9]) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5 m-top-0">
                            <div class="form-group @if ($errors->has('g-recaptcha-response')) has-error @endif">
                                {!! Captcha::display() !!}
                                <span class="help-block"><small>{!! $errors->first('g-recaptcha-response') !!}</small></span>
                            </div>
                        </div>
                        <div class="col-md-7 m-top-0">
                            {!! Form::submit('REZERVASYON OLUŞTUR', ['class'=>'btn btn-theme pull-right btn-reservation-now']) !!}
                            <a class="btn btn-theme m-rgt-5 btn-cancel pull-right btn-theme-dark" href="#">İPTAL</a>
                        </div>
                    </div>
                    {!! Form::close() !!}

                </div>

            </div>
        </div>
    </section>

@endsection

@push('js_inline')
{!! Captcha::script() !!}
@endpush