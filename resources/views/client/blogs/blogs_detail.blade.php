@extends('client.layout.master')

@section('content')
    <div class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title">
                        <h2>BÀI VIẾT</h2>
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
                            <h2 class="widget-title">CÁC BÀI VIẾT KHÁC</h2>
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
                <div class="col-main col-sm-9 main-blog" style="visibility: visible;">
                    <!--<div class="page-title"><h2></h2></div>-->
                    <div id="main" class="blog-wrapper">

                        <div id="primary" class="site-content">
                            <div id="content" role="main">
                                <article id="post-29" class="blog_entry clearfix">

                                    <div class="entry-content">
                                        <div class="featured-thumb"><a><img style="width: 908px; height: 709px"
                                                    src="{{ Storage::URL($detail_blog->image) }}" alt="blog-img4"></a></div>
                                        <header class="blog_entry-header clearfix">
                                            <div class="blog_entry-header-inner">
                                                <h1 class="blog_entry-title">{{ $detail_blog->title }}</h1>
                                            </div>
                                            <!--blog_entry-header-inner-->
                                        </header>
                                        <!--blog_entry-header clearfix-->

                                        <div class="entry-content">
                                            <ul class="post-meta">
                                                <li><i class="fa fa-user"></i>Thực hiện bởi <a>
                                                        @foreach ($users as $r)
                                                            @if ($r->id == $detail_blog->users_id)
                                                                {{ $r->name }}
                                                            @endif
                                                        @endforeach
                                                    </a> </li>
                                                <li><i class="fa fa-comments"></i><a href="#">8 comments</a> </li>
                                            </ul>
                                            <div class="thm-post">{!! $detail_blog->content !!}
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <div class="comment-content">
                                    <div class="comments-wrapper">
                                        <h3> Comments </h3>
                                        <ol class="commentlist">
                                            <li class="comment">
                                                <div>
                                                    <img alt="" src="images/member1.png"
                                                        class="avatar avatar-60 photo">
                                                    <div class="comment-text">
                                                        <div class="ratings">
                                                            <div class="rating-box">
                                                                <div style="width:100%" class="rating"></div>
                                                            </div>

                                                        </div>
                                                        <p class="meta">
                                                            <strong>John Doe</strong>
                                                            <span>–</span> <time>April 19, 2018</time>
                                                        </p>
                                                        <div class="description">
                                                            <p>Vivamus magna justo, lacinia eget consectetur sed, convallis
                                                                at tellus. Nulla quis lorem ut libero malesuada feugiat.
                                                                Proin eget tortor risus. Donec rutrum congue leo eget
                                                                malesuada. Lorem ipsum dolor sit amet, consectetur
                                                                adipiscing elit.</p>
                                                            <p>Donec sollicitudin molestie malesuada. Vivamus suscipit
                                                                tortor eget felis porttitor volutpat. Lorem ipsum dolor sit
                                                                amet, consectetur adipiscing elit. Nulla quis lorem ut
                                                                libero malesuada feugiat. Vivamus magna justo, lacinia eget
                                                                consectetur sed, convallis at tellus.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li><!-- #comment-## -->
                                            <li class="comment">
                                                <div>
                                                    <img alt="" src="images/member2.png"
                                                        class="avatar avatar-60 photo">
                                                    <div class="comment-text">
                                                        <div class="ratings">
                                                            <div class="rating-box">
                                                                <div style="width:100%" class="rating"></div>
                                                            </div>

                                                        </div>
                                                        <p class="meta">
                                                            <strong>Stephen Smith</strong> <span>–</span> <time>June 02,
                                                                2018</time>
                                                        </p>
                                                        <div class="description">
                                                            <p>Donec rutrum congue leo eget malesuada. Lorem ipsum dolor sit
                                                                amet, consectetur adipiscing elit.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li><!-- #comment-## -->
                                        </ol>
                                        <!--commentlist-->
                                    </div>
                                    <!--comments-wrapper-->

                                    <div class="comments-form-wrapper comment-respond">
                                        <h3>Leave A reply</h3>
                                        <p class="comment-notes"><span id="email-notes">Your email address will not be
                                                published.</span> Required fields are marked <span class="required">*</span>
                                        </p>
                                        <form class="comment-form" method="post" id="postComment" action="#">
                                            <div class="field">
                                                <label for="name">Name<em class="required">*</em></label>
                                                <input type="text" class="input-text" title="Name" value=""
                                                    id="user" name="user_name" placeholder="Name">
                                            </div>
                                            <div class="field">
                                                <label for="email">Email<em class="required">*</em></label>
                                                <input type="text" class="input-text validate-email" title="Email"
                                                    value="" id="email" name="user_email"
                                                    placeholder="Email Address">
                                            </div>
                                            <div class="field">
                                                <label for="email">Website<em class="required">*</em></label>
                                                <input type="text" class="input-text validate-email" title="Email"
                                                    value="" id="email" name="user_email"
                                                    placeholder="Website">
                                            </div>
                                            <div class="clear"></div>
                                            <div class="field aw-blog-comment-area">
                                                <label for="comment">Comment<em class="required">*</em></label>
                                                <textarea rows="5" cols="50" class="input-text" title="Comment" id="comment" name="comment"
                                                    placeholder="Comment"></textarea>
                                            </div>
                                            <div style="width:96%" class="button-set">
                                                <input type="hidden" value="1" name="blog_id">
                                                <button type="submit" class="bnt-comment"><span><span>Add
                                                            Comment</span></span></button>
                                            </div>
                                        </form>
                                    </div>
                                    <!--comments-form-wrapper clearfix-->

                                </div>

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
