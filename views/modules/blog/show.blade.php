@extends('layouts.master')

@section('breadcrumbs')
    <!-- BREADCRUMBS -->
    <section class="page-section breadcrumbs text-right">
        <div class="container">
            <div class="page-header">
                <h1>{{ $post->title }}</h1>
            </div>
            {!! Breadcrumbs::renderIfExists('blog.show') !!}
        </div>
    </section>
    <!-- /BREADCRUMBS -->
@endsection

@section('content')
    <div class="content-area">
        <section class="page-section with-sidebar">
            <div class="container">
                <div class="row">
                    @include('blog::partials.sidebar')
                    <div class="col-md-9 content" id="content">
                        <article class="post-wrap">
                            <div class="post-media">
                                <a href="{{ $post->present()->firstImage(null,800,'resize',80) }}" data-gal="prettyPhoto"><img src="{{ $post->present()->firstImage(null,800,'resize',80) }}" alt=""></a>
                            </div>
                            <div class="post-header">
                                <h2 class="post-title"><a href="{{ $post->url }}">{{ $post->title }}</a></h2>
                                <div class="post-meta">{{ $post->author->fullname }} / {{ $post->created_at->formatLocalized('%d %B %Y') }} / <a href="{{ $post->category->url }}">{{ $post->category->name }}</a></div>
                            </div>
                            <div class="post-body">
                                <div class="post-excerpt">
                                    <p>{!! $post->content !!}</p>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>
        @carByClass(6, 'home.slider')
    </div>
@endsection