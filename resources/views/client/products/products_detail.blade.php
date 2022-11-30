@extends('client.layout.master')

@section('content')
    <div class="page-heading">
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    {{-- <div class="col-xs-12">
                        <ul>
                            <li class="home"> <a href="index-2.html" title="Go to Home Page">Home</a> <span>&rsaquo; </span>
                            </li>
                            <li class="category1599"> <a href="grid.html" title="">New Car</a> <span>&rsaquo; </span>
                            </li>
                            <li class="category1600"> <a href="grid.html" title="">Audi</a> <span>&rsaquo; </span>
                            </li>
                            <li class="category1601"> <strong>Sedans</strong> </li>
                        </ul>
                    </div>
                    <!--col-xs-12--> --}}
                </div>
                <!--row-->
            </div>
            <!--container-->
        </div>
        <div class="page-title">
            <h2>CHI TIẾT</h2>
        </div>
    </div>
    <!-- BEGIN Main Container -->
    <div class="main-container col1-layout wow bounceInUp animated">
        <div class="main">
            <div class="col-main">
                <!-- Endif Next Previous Product -->
                <div class="product-view wow bounceInUp animated" itemscope="" itemtype="http://schema.org/Product"
                    itemid="#product_base">
                    <div id="messages_product_view"></div>
                    <!--product-next-prev-->
                    <div class="product-essential container">
                        <div class="row">

                            

                            <div class="product-img-box col-lg-5 col-sm-5 col-xs-12">
                                <div class="new-label new-top-left">Hot</div>
                                <div class="sale-label sale-top-left">-15%</div>
                                <div class="product-image">
                                    <div class="show-product">

                                        <img id="product-zoom" style="width: 500px; height: 600px" src="{{ Storage::URL($car->car_image) }}" alt="product-image" />


                                    </div>
                                    <div class="more-views">
                                        <div class="slider-items-products">

                                            <div id="gallery_01"
                                                class="product-flexslider hidden-buttons product-img-thumb">
                                                <div class="slider-items slider-width-col4 block-content">
                                                    @foreach ($album as $item)
                                                            <div class="picture">
                                                                    <img style="width:115px; height:120px " src="{{ Storage::URL($item) }}"
                                                                        alt="product-image" /> 
                                                            </div>
                                                        
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end: more-images -->
                            </div>
                            <!--End For version 1,2,6-->
                            <!-- For version 3 -->
                            <div class="product-shop col-lg- col-sm-7 col-xs-12">


                                <div class="product-name">
                                    <h1>{{ $car->name }}</h1>
                                </div>
                                @foreach ($listCarBranch as $lb)
                                    @if ($lb->id == $car->car_branch_id)
                                        <div class="brand">{{ $lb->name }}</div>
                                    @endif
                                @endforeach
                                <div class="price-block">
                                    <div class="price-box">
                                        <p class="special-price"> <span class="price-label">Special Price</span> <span
                                                id="product-price-48" class="price">
                                                {{ number_format($car->price, 0, ',', '.') }} Đ</span> </p>


                                    </div>
                                </div>






                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal">
                                    Đặt lịch
                                </button><br><br><br><br>


                                <!-- Modal -->

                            </div>
                            

                            <div class="short-description">
                                
                                <p>{{ $car->style }}</p>
                                
                  </div>
                  <div>
                    <ul style="list-style-type: none;">
                        <li>- Kích thước D x R x C: {{ $car->size }}</li><br>
                        <li>- Nguồn gốc xuất sứ: {{ $car->origin }}</li><br>
                        <li>- Động cơ: {{ $car->engine }}</li><br>
                        <li>- Công xuất: {{ $car->wattage }}</li><br>
                        <li>- Số KM đã đi: {{ $car->mileage }} KM</li>
                    </ul>
                  </div>

                            <div class="social">
                                <ul class="link">
                                  <li class="fb"><a href="#"></a></li>
                                  <li class="tw"><a href="#"></a></li>
                                  <li class="googleplus"><a href="#"></a></li>
                                  <li class="rss"><a href="#"></a></li>
                                  <li class="pintrest"><a href="#"></a></li>
                                  <li class="linkedin"><a href="#"></a></li>
                                  <li class="youtube"><a href="#"></a></li>
                                </ul>
                                
                              </div>
                              
                            
                        </div>

                    </div>
                </div>
                <!--product-essential-->
                <div class="product-collateral container">
                    <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                        <li class="active"> <a href="#product_tabs_description" data-toggle="tab">Mô tả chi tiết </a> </li>
                        <li><a href="#product_tabs_tags" data-toggle="tab">tags</a></li>
                        <li> <a href="#reviews_tabs" data-toggle="tab">Đánh giá</a> </li>
                        {{-- <li> <a href="#product_tabs_custom" data-toggle="tab">Custom Tab</a> </li>
                        <li> <a href="#product_tabs_custom1" data-toggle="tab">Custom Tab1</a> </li> --}}
                    </ul>
                    <div id="productTabContent" class="tab-content">
                        <div class="tab-pane fade in active" id="product_tabs_description">
                            <div class="std">
                                {!! $car->desc !!}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="product_tabs_tags">
                            <div class="box-collateral box-tags">
                                <div class="tags">
                                    {{-- <form id="addTagForm" action="#" method="get">
                                        <div class="form-add-tags">
                                            <label for="productTagName">Add Tags:</label>
                                            <div class="input-box">
                                                <input class="input-text" name="productTagName" id="productTagName"
                                                    type="text">
                                                <button type="button" title="Add Tags" class=" button btn-add"
                                                    onClick="submitTagForm()"> <span>Add Tags</span> </button>
                                            </div>
                                            <!--input-box-->
                                        </div>
                                    </form> --}}
                                </div>
                                <!--tags-->
                                <p class="note">Use spaces to separate tags. Use single quotes (') for phrases.</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="reviews_tabs">
                            <div class="woocommerce-Reviews">
                                <div>
                                    <h2 class="woocommerce-Reviews-title">2 Đánh giá cho  Bacca Bucci Men đang chạy
                                            Đôi giày</span></h2>
                                    <ol class="commentlist">
                                        <li class="comment">
                                            <div>
                                                <img alt="" src="{{ asset('/images/member1.png')}}"
                                                    class="avatar avatar-60 photo">
                                                <div class="comment-text">
                                                    <div class="ratings">
                                                        <div class="rating-box">
                                                            <div style="width:100%" class="rating"></div>
                                                        </div>

                                                    </div>
                                                    <p class="meta">
                                                        <strong>John Doe</strong>
                                                        <span>–</span> April 19, 2018
                                                    </p>
                                                    <div class="description">
                                                        <p>Sống tuyệt vời, váy cần tăng cường nhưng, thung lũng
                                                            tại gói.Không ai Lorem để miễn phí malesuada eu.
                                                            Lò vi sóng cần nụ cười nhiệt độ.Cho đến khi thời gian lập kế hoạch trang điểm
                                                            Malesuada.Lorem Ipsum Dolor SIT AMET,
                                                            Thủ tục đại học.</p>
                                                        <p>DONEC chăm sóc truyền hình nam giới.Trực tiếp nhận
                                                            Hãng hàng không khí chức năng vĩ mô cuối tuần.Lorem rất thông minh là
                                                            Bắt buộc, nhà phát triển đại học cà chua.Không ai là khách hàng của
                                                            MALESUADA MIỄN PHÍ Feugiat.Sống tuyệt vời chỉ, cần váy
                                                            Minneapolis, nhưng, tại cuộc vui.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li><!-- #comment-## -->
                                
                                    </ol>
                                </div>
                                <div>
                                    <div>
                                        <div class="comment-respond">
                                            <span class="comment-reply-title">Thêm một bài đánh giá</span>
                                            <form action="#" method="post" class="comment-form" novalidate>
                                                <p class="comment-notes"><span id="email-notes">địa chỉ email của bạn
                                                        sẽ không được công bố.</span> Các nhóm bắt buộc được đánh dấu <span
                                                        class="required">*</span></p>
                                                <div class="comment-form-rating">
                                                    <label id="rating">Đánh giá của bạn</label>
                                                    <p class="stars">
                                                        <span>
                                                            <a class="star-1" href="#">1</a>
                                                            <a class="star-2" href="#">2</a>
                                                            <a class="star-3" href="#">3</a>
                                                            <a class="star-4" href="#">4</a>
                                                            <a class="star-5" href="#">5</a>
                                                        </span>
                                                    </p>
                                                </div>
                                                <p class="comment-form-comment">
                                                    <label>Đánh giá của bạn <span class="required">*</span></label>
                                                    <textarea id="comment" name="comment" cols="45" rows="8" required></textarea>
                                                </p>
                                                <p class="comment-form-author">
                                                    <label for="author">Tên <span class="required">*</span></label>
                                                    <input id="author" name="author" type="text" value=""
                                                        size="30" required>
                                                </p>
                                                <p class="comment-form-email">
                                                    <label for="email">Email <span class="required">*</span></label>
                                                    <input id="email" name="email" type="email" value=""
                                                        size="30" required>
                                                </p>
                                                <p class="form-submit">
                                                    <input name="submit" type="submit" id="submit" class="submit"
                                                        value="Submit">
                                                </p>
                                            </form>
                                        </div><!-- #respond -->
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="product_tabs_custom">
                            <div class="product-tabs-content-inner clearfix">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et
                                    placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi.</p>
                                <p> Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula
                                    tellus, in imperdiet ligula euismod eget. Pellentesque habitant morbi tristique
                                    senectus et netus et malesuada fames ac turpis egestas. Nam erat mi, rutrum at
                                    sollicitudin rhoncus, ultricies posuere erat. Duis convallis, arcu nec aliquam
                                    consequat, purus felis vehicula felis, a dapibus enim lorem nec augue.</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="product_tabs_custom1">
                            <div class="product-tabs-content-inner clearfix">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et
                                    placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras
                                    neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus,
                                    in imperdiet ligula euismod eget. Pellentesque habitant morbi tristique senectus et
                                    netus et malesuada fames ac turpis egestas. Nam erat mi, rutrum at sollicitudin
                                    rhoncus, ultricies posuere erat. Duis convallis, arcu nec aliquam consequat, purus
                                    felis vehicula felis, a dapibus enim lorem nec augue.</p>
                            </div>
                        </div>
                    </div>
                </div>


                <!--product-collateral-->
                <div class="box-additional">
                    <!-- BEGIN RELATED PRODUCTS -->
                    <div class="related-pro container">
                        <div class="slider-items-products">
                            <div class="new_title center">
                                <h2>Sản phẩm liên quan</h2>
                            </div>
                            <div id="related-slider" class="product-flexslider hidden-buttons">
                                <div class="slider-items slider-width-col4 products-grid">

                                    @foreach ($car_branch as $item)
                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="item-img">
                                                    <div class="item-img-info"><a href="product-detail.html"
                                                            title="Retis lapen casen" class="product-image"><img style="width: 200px; height: 250px"
                                                                src="{{ Storage::URL($item->car_image) }}"
                                                                alt="Retis lapen casen"></a>
                                                        <div class="new-label new-top-left">Used</div>
                                                        <div class="sale-label sale-top-left">-15%</div>
                                                        <div class="item-box-hover">
                                                            <div class="box-inner">
                                                                <div class="add_cart">
                                                                    <button class="button btn-cart"
                                                                        type="button"></button>
                                                                </div>
                                                                <div class="product-detail-bnt"><a
                                                                        class="button detail-bnt"><span>Quick
                                                                            View</span></a></div>
                                                                <div class="actions"><span class="add-to-links"><a
                                                                            href="#" class="link-wishlist"
                                                                            title="Add to Wishlist"><span>Add to
                                                                                Wishlist</span></a> </span> </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title"><a
                                                                href="{{ route('route_FE_Client_Products_detail', $item->id) }}"
                                                                title="Retis lapen casen">{{ $item->name }}</a> </div>
                                                        <div class="item-content">
                                                            <div class="rating">
                                                                <div class="ratings">
                                                                    <div class="rating-box">
                                                                        <div class="rating" style="width:80%"></div>
                                                                    </div>
                                                                    <p class="rating-links"><a href="#">1
                                                                            Review(s)</a> <span class="separator">|</span>
                                                                        <a href="#">Add Review</a>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="item-price">
                                                                <div class="price-box"><span class="regular-price"><span
                                                                            class="price">{{ number_format($item->price, 0, ',', '.') }}vnđ</span>
                                                                    </span> </div>
                                                            </div>
                                                            <div class="other-info">
                                                                <div class="col-km"><i class="fa fa-tachometer"></i>
                                                                    4875km</div>
                                                                <div class="col-engine"><i class="fa fa-gear"></i>
                                                                    Automatic</div>
                                                                <div class="col-date"><i class="fa fa-calendar"
                                                                        aria-hidden="true"></i> 2018</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach



                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end related product -->
                </div>
                <!-- end related product -->
            </div>
            <!--box-additional-->
            <!--product-view-->
        </div>
    </div>
    <!--col-main-->
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="add-to-box">
                        <div class="col-lx-6">
                            <form action="{{ route('route_FE_Client_Products_booking') }}" method="POST">
                                @csrf
                                <label class="form-label" for="form3Example1q">Họ
                                    tên</label>
                                <div class="form-outline">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Nhập tên của bạn" />
                                        @error('name')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                                </div>
                                @error('name')
                                    <span style="color: red"> {{$message}} </span>
                                @enderror

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-outline datepicker">
                                            <label class="form-label">Email</label>
                                            <input type="text" class="form-control" id="email" name="email"
                                                placeholder="Nhập email của bạn" />
                                                @error('email')
                                                <span style="color: red"> {{ $message }} </span>
                                            @enderror
                                        </div>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-outline">
                                            <label class="form-label">Số Điện thoại</label>
                                            <input type="text" class="form-control" id="phone_number" name="phone"
                                                placeholder="Nhập số điện thoại " />
                                                @error('phone')
                                                <span style="color: red"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-outline">
                                            <label class="form-label">Ngày Sinh</label>
                                            <input type="date" class="form-control" name="birthday">
                                            @error('birthday')
                                                <span style="color: red"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6 md-4 mt-2">
                                        <div class="form-outline datepicker">
                                            <label class="form-label">Ca</label>
                                            <select name="booking_time_id" class="form-control">
                                                <option value="">chọn ca</option>
                                                @foreach ($time as $ca)
                                                    <option value="{{ $ca->id }}">
                                                        {{ $ca->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('booking_time_id')
                                                <span style="color: red"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 md-4 mt-2">
                                        <div class="form-outline datepicker">
                                            <label class="form-label">Dịck Vụ</label>
                                            <select name="services_id" class="form-control">
                                                <option value=""> chọn dịch vụ
                                                </option>
                                                @foreach ($services as $s)
                                                    <option value="{{ $s->id }}">
                                                        {{ $s->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('services_id')
                                                <span style="color: red"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12 mt-3">
                                        <div class="form-outline datepicker">
                                            <label class="form-label">description</label>
                                            <textarea class="form-control" rows="15" placeholder=""></textarea>

                                        </div>
                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save
                                        changes</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
