@extends('layouts.master')

@section('breadcrumbs')
    <!-- BREADCRUMBS -->
    <section class="page-section breadcrumbs text-right">
        <div class="container">
            <div class="page-header">
                <h1>{{ trans('blog::blog.title') }}</h1>
            </div>
            {!! Breadcrumbs::renderIfExists('blog') !!}
        </div>
    </section>
    <!-- /BREADCRUMBS -->
@endsection

@section('content')
    <div class="content-area">

        <!-- PAGE WITH SIDEBAR -->
        <section class="page-section with-sidebar">
            <div class="container">
                <div class="row">

                @include('blog::partials.sidebar')

                <!-- CONTENT -->
                    <div class="col-md-9 content" id="content">
                    @foreach($posts as $post)
                        @include('blog::partials._article')
                    @endforeach
                    <!-- Pagination -->
                        <div class="pagination-wrapper">
                            {{ $posts->render('blog::pagination.default') }}
                        </div>
                        <!-- /Pagination -->

                    </div>
                    <!-- /CONTENT -->

                </div>
            </div>
        </section>
        <!-- /PAGE WITH SIDEBAR -->

    </div>
@endsection