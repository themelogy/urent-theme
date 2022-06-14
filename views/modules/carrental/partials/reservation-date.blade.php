{!! Form::open(['route'=>'carrental.reservation.update', 'method'=>'put', 'rel'=>'nofollow']) !!}
{!! Form::hidden('car_id', $car->id) !!}
<div class="form-group has-icon has-label">
    <label for="formSearchUpLocation3">{{ trans('themes::theme.reservation.start location') }}</label>
    {!! Form::select('start_location', CarLocationRepository::all()->pluck('name', 'id'),old('start_location', isset($reservation->start_location) ? $reservation->start_location : ''),['class'=>'selectpicker', 'data-live-search'=>'true', 'data-width'=>'100%', 'data-toggle'=>'tooltip', 'title'=>'select']) !!}
    <span class="form-control-icon"><i class="fa fa-map-marker"></i></span>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group has-icon has-label">
            {!! Form::label('pick_at', trans('themes::theme.reservation.pickup date')) !!}
            {!! Form::text('pick_at', old('pick_at', isset($reservation->pick_at) ? $reservation->pick_at->format('d.m.Y') : ''), ['id'=>'pick_at', 'placeholder'=>Carbon::now()->format('d.m.Y'), 'class'=>'form-control']) !!}
            <span class="form-control-icon"><i class="fa fa-calendar"></i></span>
            {!! $errors->first("pick_at", '<span class="help-block">:message</span>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group has-icon has-label selectpicker-wrapper">
            {!! Form::label('pick_hour', trans('themes::theme.reservation.pickup hour')) !!}
            {!! Form::selectHours('pick_hour', '00:00', '23:30', old('pick_hour', isset($reservation->pick_at) ? $reservation->pick_at->format('H:i') : ''), ['class'=>'selectpicker', 'data-live-search'=>'true', 'data-width'=>'100%', 'data-toggle'=>'tooltip', 'title'=>'select']) !!}
            <span class="form-control-icon"><i class="fa fa-clock-o"></i></span>
        </div>
    </div>
</div>

<div class="form-group has-icon has-label">
    <label for="formSearchOffLocation3">{{ trans('themes::theme.reservation.return location') }}</label>
    {!! Form::select('return_location', CarLocationRepository::all()->pluck('name', 'id'),old('return_location', isset($reservation->return_location) ? $reservation->return_location : ''),['class'=>'selectpicker', 'data-live-search'=>'true', 'data-width'=>'100%', 'data-toggle'=>'tooltip', 'title'=>'select']) !!}
    <span class="form-control-icon"><i class="fa fa-map-marker"></i></span>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group has-icon has-label">
            {!! Form::label('drop_at', trans('themes::theme.reservation.drop date')) !!}
            {!! Form::text('drop_at', old('drop_at', isset($reservation->drop_at) ? $reservation->drop_at->format('d.m.Y') : ''), ['id'=>'drop_at', 'placeholder'=>Carbon::now()->format('d.m.Y'), 'class'=>'form-control']) !!}
            <span class="form-control-icon"><i class="fa fa-calendar"></i></span>
            {!! $errors->first("drop_at", '<span class="help-block">:message</span>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group has-icon has-label selectpicker-wrapper">
            {!! Form::label('drop_hour', trans('themes::theme.reservation.drop hour')) !!}
            {!! Form::selectHours('drop_hour', '00:00', '23:30', old('drop_hour', isset($reservation->drop_at) ? $reservation->drop_at->format('H:i') : ''), ['class'=>'selectpicker', 'data-live-search'=>'true', 'data-width'=>'100%', 'data-toggle'=>'tooltip', 'title'=>'select']) !!}
            <span class="form-control-icon"><i class="fa fa-clock-o"></i></span>
        </div>
    </div>
</div>
<button name="reservationUpdate" type="submit" class="btn btn-submit btn-theme btn-theme-dark btn-block" value="1">{{ $button ?? 'Fiyatları Güncelle' }}</button>
{!! Form::close() !!}


@push('js_inline')
<script>
    jQuery(document).ready(function () {
        $('#pick_at').datetimepicker({
            format: 'DD.MM.YYYY',
			locale: '{{ locale() }}',
            minDate: '{{ isset($reservation->pick_at) ? $reservation->pick_at->format('Y/m/d') : Carbon::today()->format('Y/m/d') }}',
			@if(isset($reservation->drop_at))
			maxDate: '{{ isset($reservation->drop_at) ? $reservation->drop_at->format('Y/m/d') : Carbon::today()->addDays(1)->format('Y/m/d') }}'
			@endif
        });
        $('#drop_at').datetimepicker({
            format: 'DD.MM.YYYY',
			locale: '{{ locale() }}',
            useCurrent: false,
			minDate: '{{ Carbon::tomorrow()->format('Y/m/d') }}'
        });
        $("#pick_at").on("dp.change", function (e) {
			var tomorrow = new Date(e.date+1000*60*60*24);
            $('#drop_at').data("DateTimePicker").minDate(tomorrow);
        });
        $("#drop_at").on("dp.change", function (e) {
			var yesterday = new Date(e.date-1000*60*60*24);
            $('#pick_at').data("DateTimePicker").maxDate(yesterday);
        });
    });
</script>
@endpush