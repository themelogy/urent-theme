@extends('layouts.master')

@section('breadcrumbs')
    <!-- BREADCRUMBS -->
    <section class="page-section breadcrumbs text-right">
        <div class="container">
            <div class="page-header">
                <h1 class="title">{{ $faq->title }}</h1>
            </div>
            {!! Breadcrumbs::renderIfExists('faq.view') !!}
        </div>
    </section>
    <!-- /BREADCRUMBS -->
@endsection

@section('content')
    <div class="page-section">
        <div class="container">
            <div class="col-md-9">
                {!! $faq->content !!}
            </div>
            <div class="col-md-3">
                <aside class="booking-filters mb10" style="width: 100%;">
                    @faqCategories()
                </aside>
            </div>
        </div>
    </div>
@stop
