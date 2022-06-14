@extends('layouts.master')

@section('breadcrumbs')
    <!-- BREADCRUMBS -->
    <section class="page-section breadcrumbs text-right">
        <div class="container">
            <div class="page-header">
                <h1>{{ trans('themes::faq.title') }}</h1>
            </div>
            {!! Breadcrumbs::renderIfExists('faq.index') !!}
        </div>
    </section>
    <!-- /BREADCRUMBS -->
@endsection

@section('content')

    <div class="page-section">
        <div class="container">
            <div class="col-md-9">
                <div class="panel-group" id="accordion">
                    @isset($faqs)
                        @foreach($faqs as $faq)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $loop->iteration }}" >{{ $faq->title }}</a>
                                </h4>
                            </div>
                            <div class="panel-collapse collapse{{ $loop->first ? ' in' : '' }}" id="collapse-{{ $loop->iteration }}">
                                <div class="panel-body">
                                    {!! $faq->content !!}
                                    <a class="label label-default pull-right" href="{{ $faq->url }}"><i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endisset
                    @empty($faqs)
                            <div class="alert alert-warning">
                                <button class="close" type="button" data-dismiss="alert"><span aria-hidden="true">×</span>
                                </button>
                                <p class="text-small">Sıkça sorulan soru bulunamadı.</p>
                            </div>
                    @endempty
                </div>
            </div>
            <div class="col-md-3">
                <aside class="booking-filters mb10" style="width: 100%;">
                    @faqCategories()
                </aside>
            </div>
        </div>
    </div>
@stop
