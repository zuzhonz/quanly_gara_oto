@extends('client.layout.master')

@section('content')
    <div class="content">
        <div class="container">

        </div>
        <div class="container-fluid">

            <div class="row">
                <div class="home-slider5">
                    <div id="thmg-slideshow" class="thmg-slideshow">
                        <div id='rev_slider_4_wrapper' class='rev_slider_wrapper fullwidthbanner-container'>
                            <div id='rev_slider_4' class='rev_slider fullwidthabanner'>
                                <ul>
                                    @foreach ($banner as $item)
                                        <li data-transition='random' data-slotamount='7' data-masterspeed='1000'
                                            data-thumb='{{ Storage::URL($item->image) }}'><img
                                                style="width: 1472px; height: 650px" src='{{ Storage::URL($item->image) }}'
                                                data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner" />
                                            <div class="container">
                                                <div class="content_slideshow">
                                                    {{-- <div class="row">
                                                    <div>
                                                        <div class="info">
                                                          <div class='tp-caption LargeTitle sfl  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3; white-space:nowrap;'>{{ $item->title }}</div>
                                                        </div>
                                                      </div>
                                                </div> --}}
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="tp-bannertimer"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Category slider Start-->

        <div class="section-filter">
            <div class="b-filter__inner bg-grey">
                <h2>T??m ki???m chi???c xe m?? b???n mong mu???n</h2>
                <form class="b-filter" action="{{ route('route_FE_Client_Home_filter') }}" method="Post">
                    @csrf
                    <div class="btn-group bootstrap-select">
                        <select class="selectpicker" name="branch" data-width="100%" tabindex="-98">
                            <option>Ch???n h??ng xe</option>
                            @foreach ($listCarBranch as $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="btn-group bootstrap-select">
                        <select class="selectpicker" name="origin" data-width="100%" tabindex="-98">
                            <option>N??i s???n xu???t</option>
                            @foreach ($origin as $item)
                                <option value="{{ $item->origin }}">{{ $item->origin }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="btn-group bootstrap-select">
                        <select class="selectpicker" name="engine" data-width="100%" tabindex="-98">
                            <option>?????ng c??</option>
                            @foreach ($engine as $item)
                                <option value="{{ $item->engine }}">{{ $item->engine }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="btn-group bootstrap-select">
                        <select class="selectpicker" name="mileage" data-width="100%" tabindex="-98">
                            <option>Klm</option>
                            @foreach ($mileage as $item)
                                <option value="{{ $item->mileage }}">{{ $item->mileage }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="btn-group bootstrap-select">
                        <input type="number" class="form-control selectpicker" value="" placeholder="gi?? ti???n...."
                            name="price">
                    </div>
                    <div>
                        <div class="b-filter__btns">
                            <button class="btn btn-lg btn-primary">T??m ki???m</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>



        <!-- best Pro Slider -->
        <section class=" wow bounceInUp animated">
            <div class="hot_deals slider-items-products container">
                <div class="new_title">
                    <h2>Xe m???i v???</h2>
                </div>
                <div id="hot_deals" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col4 products-grid">
                        @foreach ($car as $item)
                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info">
                                            <a href="accessories-detail.html" title="Retis lapen casen"
                                                class="product-image">
                                                <img style="width: 200px; height: 250px"
                                                    src="{{ Storage::URL($item->car_image) }} " alt="Retis lapen casen">

                                            </a>

                                            <div class="new-label new-top-left">Used</div>
                                            <div class="sale-label sale-top-left">-15%</div>
                                            <div class="item-box-hover">
                                                <div class="box-inner">
                                                    <div class="add_cart">
                                                        <button class="button btn-cart" type="button"></button>
                                                    </div>
                                                    <div class="product-detail-bnt"><a class="button detail-bnt"><span>Quick
                                                                View</span></a></div>
                                                    <div class="actions"><span class="add-to-links"><a href="#"
                                                                class="link-wishlist" title="Add to Wishlist"><span>Add to
                                                                    Wishlist</span></a> </span> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"><a
                                                    href="{{ route('route_FE_Client_Products_detail', $item->id) }}"
                                                    title="Retis lapen casen"> {{ $item->name }}</a> </div>
                                            <div class="item-content">
                                                <div class="rating">
                                                    <div class="ratings">
                                                        <div class="rating-box">
                                                            <div class="rating" style="width:80%"></div>
                                                        </div>
                                                        <p class="rating-links"><a href="#">1 Review(s)</a> <span
                                                                class="separator">|</span> <a href="#">Add
                                                                Review</a> </p>
                                                    </div>
                                                </div>
                                                <div class="item-price">
                                                    <div class="price-box"><span class="regular-price"><span
                                                                class="price">
                                                                {{ number_format($item->price, 0, ',', '.') }} VN?? </span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="other-info">
                                                    <div class="col-km"><i class="fa fa-tachometer"></i> 4875km</div>
                                                    <div class="col-engine"><i class="fa fa-gear"></i> Automatic</div>
                                                    <div class="col-date"><i class="fa fa-calendar"
                                                            aria-hidden="true"></i> 2018</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- Item -->
                    </div>
                </div>
            </div>
        </section>

        <!-- Logo Brand Block -->
        <div class="brand-logo wow bounceInUp animated">
            <div class="container">
                <div class="row">
                    <div class="home-banner col-lg-2 hidden-md col-xs-12 hidden-sm"> </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <div class="testimonials-section">
                            <div class="offer-slider parallax parallax-2">
                                <ul class="bxslider">
                                    <li>
                                        <div class="avatar"><img src="images/member1.png" alt="Image"></div>
                                        <div class="testimonials">Ch??? ????? ho??n h???o v?? t???t nh???t trong t???t c??? nh???ng g?? b???n c??
                                            t??y ch???n ????? l???a ch???n! R???t nhanh ????p ???ng! T??i ????nh gi?? cao ch??? ????? n??y v?? nh???ng
                                            M???i ng?????i!</div>
                                        <div class="clients_author">Anh Tu???n<span>Ch??c m???ng kh??ch h??ng</span> </div>
                                    </li>
                                    <li>
                                        <div class="avatar"><img src="images/member2.png" alt="Image"></div>
                                        <div class="testimonials">M??, m???u v?? nh???ng th??? kh??c r???t t???t. S??? h??? tr??? c??
                                            ???? ph???c v??? t??i ngay l???p t???c v?? gi???i quy???t c??c v???n ????? c???a t??i khi t??i c???n tr???
                                            gi??p. l?? ????? ???????c
                                            ch??c m???ng.</div>
                                        <div class="clients_author">Sahara Anderson <span>Ch??c m???ng kh??ch h??ng</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="avatar"><img src="images/member3.png" alt="Image"></div>
                                        <div class="testimonials">S??? h??? tr??? v?? ph???n h???i c???a ch??ng t??i th???t tuy???t v???i, gi??p
                                            t??i
                                            v???i m???t s??? v???n ????? t??i ???? g???p v?? ???? gi???i quy???t ch??ng g???n nh?? c??ng ng??y. M???t
                                            h??n h???nh ???????c l??m vi???c v???i h???! </div>
                                        <div class="clients_author">Stephen Smith <span>Ch??c m???ng kh??ch h??ng</span> </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- best Pro Slider -->

    <section class=" wow bounceInUp animated">
        <div class="best-pro slider-items-products container">
            <div class="new_title">
                <h2>C??c d??ng xe n???i b???t</h2>
            </div>
            <div id="best-seller" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col4 products-grid">
                    @foreach ($car as $item)
                        @if ($item->car_hot == 1)
                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info">
                                            <a href="accessories-detail.html" title="Retis lapen casen"
                                                class="product-image">
                                                <img style="width: 200px; height: 250px"
                                                    src="{{ Storage::URL($item->car_image) }} " alt="Retis lapen casen">

                                            </a>

                                            <div class="new-label new-top-left">Used</div>
                                            <div class="sale-label sale-top-left">-15%</div>
                                            <div class="item-box-hover">
                                                <div class="box-inner">
                                                    <div class="add_cart">
                                                        <button class="button btn-cart" type="button"></button>
                                                    </div>
                                                    <div class="product-detail-bnt"><a
                                                            class="button detail-bnt"><span>Quick
                                                                View</span></a></div>
                                                    <div class="actions"><span class="add-to-links"><a href="#"
                                                                class="link-wishlist" title="Add to Wishlist"><span>Add to
                                                                    Wishlist</span></a> </span> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"><a
                                                    href="{{ route('route_FE_Client_Products_detail', $item->id) }}"
                                                    title="Retis lapen casen"> {{ $item->name }}</a> </div>
                                            <div class="item-content">
                                                <div class="rating">
                                                    <div class="ratings">
                                                        <div class="rating-box">
                                                            <div class="rating" style="width:80%"></div>
                                                        </div>
                                                        <p class="rating-links"><a href="#">1 Review(s)</a> <span
                                                                class="separator">|</span> <a href="#">Add
                                                                Review</a> </p>
                                                    </div>
                                                </div>
                                                <div class="item-price">
                                                    <div class="price-box"><span class="regular-price"><span
                                                                class="price">
                                                                {{ number_format($item->price, 0, ',', '.') }} VN?? </span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="other-info">
                                                    <div class="col-km"><i class="fa fa-tachometer"></i> 4875km</div>
                                                    <div class="col-engine"><i class="fa fa-gear"></i> Automatic</div>
                                                    <div class="col-date"><i class="fa fa-calendar"
                                                            aria-hidden="true"></i>
                                                        2018</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <!-- Item -->
                </div>
            </div>
        </div>
    </section>

    <!-- Home Lastest Blog Block -->

    <div class="latest-blog wow bounceInUp animated animated container">
        <!--exclude For version 6 -->
        <div class="blog-home-inner">
            <div class="blog-title">
                <h2>B??I VI???T M???I NH???T</h2>
            </div>
            <!--For version 1,2,3,4,5,6,8 -->
            <div class="row">
                @foreach ($blogs as $item)
                    <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4 blog-post">
                        <div class="blog_inner">
                            <div class="blog-img"> <a href="{{ route('route_FE_Client_Blogs_detail', $item->id) }}"> <img
                                        style="width: 400px; height: 300px" src="{{ Storage::URL($item->image) }}"
                                        alt="blog image"> </a> </div>
                            <!--blog-img-->
                            <div class="blog-info">
                                <ul class="post-meta">
                                    <li><i class="fa fa-user"></i>Th???c hi???n b???i <a href="#">
                                            @foreach ($users as $r)
                                                @if ($r->id == $item->users_id)
                                                    {{ $r->name }}
                                                @endif
                                            @endforeach
                                        </a> </li>
                                    <li><i class="fa fa-comments"></i><a href="#">4 b??nh lu???n</a> </li>
                                </ul>
                                <h3><a
                                        href="{{ route('route_FE_Client_Blogs_detail', $item->id) }}">{{ $item->title }}</a>
                                </h3>
                                <p>{!! substr($item->content, 0, -20) !!}...</p>
                            </div>
                        </div>
                        <!--blog_inner-->
                    </div>
                @endforeach
            </div>
        </div>
        <!--END For version 1,2,3,4,5,6,8 -->
        <!--exclude For version 6 -->
        <!--container-->
    </div>

    <div class="logo-brand container">
        <div class="brand-title">
            <h2>TH????NG HI???U N???I TI???NG</h2>
        </div>
        <div class="slider-items-products">
            <div id="brand-slider" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col6">
                    <!-- Item -->
                    <div class="item">
                        <div class="logo-item"><a href="#"><img src="images/brand1.png" alt="Image"></a></div>
                    </div>
                    <div class="item">
                        <div class="logo-item"><a href="#"><img src="images/brand2.png" alt="Image"></a></div>
                    </div>
                    <!-- End Item -->
                    <!-- Item -->
                    <div class="item">
                        <div class="logo-item"><a href="#"><img src="images/brand3.png" alt="Image"></a></div>
                    </div>
                    <div class="item">
                        <div class="logo-item"><a href="#"><img src="images/brand4.png" alt="Image"></a></div>
                    </div>
                    <!-- End Item -->
                    <!-- Item -->
                    <div class="item">
                        <div class="logo-item"><a href="#"><img src="images/brand5.png" alt="Image"></a></div>
                    </div>
                    <div class="item">
                        <div class="logo-item"><a href="#"><img src="images/brand6.png" alt="Image"></a></div>
                    </div>
                    <!-- End Item -->
                    <!-- Item -->
                    <div class="item">
                        <div class="logo-item"><a href="#"><img src="images/brand1.png" alt="Image"></a></div>
                    </div>
                    <div class="item">
                        <div class="logo-item"><a href="#"><img src="images/brand2.png" alt="Image"></a></div>
                    </div>
                    <!-- End Item -->
                    <!-- Item -->
                    <div class="item">
                        <div class="logo-item"><a href="#"><img src="images/brand3.png" alt="Image"></a></div>
                    </div>
                    <div class="item">
                        <div class="logo-item"><a href="#"><img src="images/brand4.png" alt="Image"></a></div>
                    </div>
                    <!-- End Item -->
                    <!-- Item -->
                    <div class="item">
                        <div class="logo-item"><a href="#"><img src="images/brand5.png" alt="Image"></a></div>
                    </div>
                    <div class="item">
                        <div class="logo-item"><a href="#"><img src="images/brand6.png" alt="Image"></a></div>
                    </div>
                    <!-- End Item -->

                </div>
            </div>
        </div>
    </div>
@endsection
