<!-- SIDEBAR -->
<aside class="col-md-3 sidebar" id="sidebar">
    <!-- widget car categories -->
    <div class="widget shadow car-categories">
        <h4 class="widget-title">KATEGORİ</h4>
        <div class="widget-content">
            <ul>
                @foreach(BlogCategory::all() as $category)
                    <li>
                        <a href="{{ $category->url }}">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- widget helping center -->
    <div class="widget shadow widget-helping-center">
        <h4 class="widget-title">{{ trans('themes::theme.call us now') }}</h4>
        <div class="widget-content">
            <p>Size yardımcı olabilmek için elimizden geleni yapacağız.</p>
            <h5 class="widget-title-sub">{{ setting('theme::phone') }}</h5>
            <p><a href="mailto:{!! HTML::email(setting('theme::email')) !!}">{!! HTML::email(setting('theme::email')) !!}</a></p>
        </div>
    </div>
    <!-- /widget helping center -->

    <div class="widget widget-tabs alt">
        <div class="widget-content">
            <ul id="tabs" class="nav nav-justified">
                <li><a href="#tab-s1" data-toggle="tab">
                        <small>SON YAZILAR</small>
                    </a></li>
                <li class="active"><a href="#tab-s2" data-toggle="tab">
                        <small>POPÜLER YAZILAR</small>
                    </a></li>
            </ul>
            <div class="tab-content">
                <!-- tab 1 -->
                <div class="tab-pane fade" id="tab-s1">
                    <div class="recent-post">
                        @foreach(Blog::latest(5) as $latest)
                            <div class="media">
                                <a class="pull-left media-link" href="#">
                                    <img class="media-object" src="{{ $latest->present()->firstImage(70,70,'fit',80) }}" alt="{{ $latest->title }}">
                                    <i class="fa fa-plus"></i>
                                </a>
                                <div class="media-body">
                                    <div class="media-meta">
                                        {{ $latest->created_at->formatLocalized('%d %B %Y') }}
                                    </div>
                                    <h4 class="media-heading"><a href="{{ $latest->url }}">{{ $latest->title }}</a></h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- tab 2 -->
                <div class="tab-pane fade in active" id="tab-s2">
                    <div class="recent-post">
                        @foreach(Blog::latest(5) as $latest)
                            <div class="media">
                                <a class="pull-left media-link" href="#">
                                    <img class="media-object" src="{{ $latest->present()->firstImage(70,70,'fit',80) }}" alt="{{ $latest->title }}">
                                    <i class="fa fa-plus"></i>
                                </a>
                                <div class="media-body">
                                    <div class="media-meta">
                                        {{ $latest->created_at->formatLocalized('%d %B %Y') }}
                                    </div>
                                    <h4 class="media-heading"><a href="{{ $latest->url }}">{{ $latest->title }}</a></h4>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="widget widget-tag-cloud">
        <h4 class="widget-title"><span>ETİKETLER</span></h4>
        <ul>
            @if(Request::route()->getName() == 'blog.index' || Request::route()->getName() == 'blog.category' || Request::route()->getName() == 'blog.tag')
                @foreach(Blog::latest(20) as $latest)
                    <?php $tag = $latest->tags()->first(); ?>
                    @if($tag)
                        <li><a href="{{ route('blog.tag', [$tag->slug]) }}">{{ $tag->name }}</a></li>
                    @endif
                @endforeach
            @else
                @foreach($post->tags()->get() as $tag)
                    <li><a href="{{ route('blog.tag', [$tag->slug]) }}">{{ $tag->name }}</a></li>
                @endforeach
            @endif
        </ul>
    </div>

</aside>
<!-- /SIDEBAR -->