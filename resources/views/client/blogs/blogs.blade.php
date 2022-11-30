@extends('client.layout.master')

@section('content')
    <div class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title">
                        <h2>Blog</h2>
                    </div>
                </div>
                <!--col-xs-12-->
            </div>
            <!--row-->
        </div>
        <!--container-->
    </div>
    <!-- BEGIN Main Container -->
    <div class="main-container col2-right-layout">
        <div class="main container">
            <div class="row">
                <div class="col-left sidebar col-sm-3 blog-side">
                    <div class="block widget_search">
                        <form id="searchform" action="#" method="get">
                            <div class="input-group">
                                <input type="text" name="s" id="s" placeholder="Search For"
                                    class="input-text" autocomplete="off">
                                <div class="input-group-append">
                                    <button type="submit" class="thm-search"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="secondary" class="widget_wrapper13" role="complementary">
                        <div id="recent-posts-4" class="popular-posts widget block" style="visibility: visible;">
                            <h2 class="widget-title">CÁC BÀI VIẾT Mới</h2>
                            <ul class="posts-list unstyled clearfix">
                                @foreach ($blogs as $item)
                                    <li>
                                        <figure class="featured-thumb"> <a
                                                href="{{ route('route_FE_Client_Blogs_detail', $item->id) }}"> <img
                                                    style="width: 258px; height: 200px"
                                                    src="{{ Storage::URL($item->image) }}" alt="blog image"> </a> </figure>
                                        <!--featured-thumb-->
                                        <div class="content-info">
                                            <h4><a href="{{ route('route_FE_Client_Blogs_detail', $item->id) }}"
                                                    title="Lorem ipsum dolor sit amet">{{ $item->title }}</a></h4>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>

                            <!--widget-content-->
                        </div>
                    </div>

                </div>
                <div class="col-main col-sm-9 main-blog">
                    <div id="main" class="blog-wrapper">
                        <div id="primary" class="site-content">
                            <div id="content" role="main">
                                @foreach ($blogs as $item)
                                    <article id="post-29"
                                        class="blog_entry clearfix wow bounceInUp animated animated animated"
                                        style="visibility: visible;">

                                        <div class="entry-content">
                                            <div class="featured-thumb"><a
                                                    href="{{ route('route_FE_Client_Blogs_detail', $item->id) }}"><img
                                                        style="width: 908px; height: 508px"
                                                        src="{{ Storage::URL($item->image) }}" alt="blog-img3"></a></div>
                                            <header class="blog_entry-header clearfix">
                                                <div class="blog_entry-header-inner">
                                                    <h2 class="blog_entry-title"> <a
                                                            href="{{ route('route_FE_Client_Blogs_detail', $item->id) }}"
                                                            rel="bookmark">{{ $item->title }}</a> </h2>

                                                </div>
                                                <!--blog_entry-header-inner-->
                                            </header>
                                            <div class="entry-content">
                                                <ul class="post-meta">
                                                    <li><i class="fa fa-user"></i>Thực hiện bởi <a>
                                                            @foreach ($users as $r)
                                                                @if ($r->id == $item->users_id)
                                                                    {{ $r->name }}
                                                                @endif
                                                            @endforeach
                                                        </a> </li>
                                                    <li><i class="fa fa-comments"></i><a href="#">8 comments</a> </li>
                                                </ul>
                                                <p>{!! $item->content !!}</p>
                                            </div>
                                            <div class="thm-readmore"><a href="#" class="btn">READ MORE</a></div>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </div>
                        <div class="pager">
                            <div class="pages">
                                <!--<strong></strong>-->
                                <ol class="pagination">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="blog905b.html?p=2">2</a></li>
                                    <li><a href="blog905b.html?p=2">3</a></li>
                                    <li><a href="blog905b.html?p=2">4</a></li>
                                    <li><a href="blog905b.html?p=2">5</a></li>
                                    <li><a href="blog905b.html?p=2">6</a></li>
                                    <li> <a class="next i-next" href="blog905b.html?p=2" title="Next"> » </a> </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!--#main wrapper grid_8-->

                </div>
                <!--col-main col-sm-9-->
            </div>
        </div>
        <!--main-container-->

    </div>
    <!--col2-layout-->
@endsection
