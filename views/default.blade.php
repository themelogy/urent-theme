@extends('layouts.master')

@section('breadcrumbs')
    <!-- BREADCRUMBS -->
    <section class="page-section breadcrumbs text-right">
        <div class="container">
            <div class="page-header">
                <h1>{{ $page->title }}</h1>
            </div>
            {!! Breadcrumbs::renderIfExists('page') !!}
        </div>
    </section>
    <!-- /BREADCRUMBS -->
@endsection

@section('content')
    <!-- PAGE -->
    <section class="page-section color">
        <div class="container">
            @if(isset($page->parent) && ($page->parent->settings->show_menu ?? false) && !($page->settings->full_page ?? false))
                @include('page::partials.menu')
            @elseif($page && ($page->settings->list_page ?? false))
                @include('page::partials.list')
            @elseif($page && !($page->settings->list_page ?? false) && !($page->parent->settings->show_menu ?? false))
                @include('page::partials.image')
            @endif
        </div>
    </section>
    <!-- /PAGE -->
@stop
