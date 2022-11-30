@extends('client.layout.master')

@section('content')
    <div class="page-heading">
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
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
                    <!--col-xs-12-->
                </div>
                <!--row-->
            </div>
            <!--container-->
        </div>
        <div class="page-title">
            <h2>PRODUCT LISTING</h2>
        </div>
    </div>
    <!--breadcrumbs-->
    <!-- BEGIN Main Container col2-left -->
    <section class="main-container col2-left-layout bounceInUp animated">
        <div class="container">
            <div class="row">
                <div class="col-main col-sm-9 col-sm-push-3 product-grid">
                    <div class="pro-coloumn">
                        <article class="col-main">
                            <div class="toolbar">

                            </div>
                            <div class="category-products">
                                <ol class="products-list" id="products-list">

                                    @foreach ($car as $item)
                                        <li class="item first">


                                            <div class="product-image"> <a href="product-detail.html"
                                                    title="HTC Rhyme Sense">
                                                    <img class="small-image" src="{{ Storage::URL($item->car_image) }}"
                                                        alt="HTC Rhyme Sense">
                                                </a>
                                            </div>


                                            <div class="product-shop">
                                                <h2 class="product-name"><a href="product-detail.html"
                                                        title="HTC Rhyme Sense">{{ $item->name }}</a></h2>
                                                <div class="ratings">
                                                    <div class="rating-box">
                                                        <div style="width:50%" class="rating"></div>
                                                    </div>
                                                    <p class="rating-links"> <a
                                                            href="#/review/product/list/id/167/category/35/">1 Review(s)</a>
                                                        <span class="separator">|</span> <a href="#review-form">Add Your
                                                            Review</a>
                                                    </p>
                                                </div>
                                                <div class="desc std">
                                                    {!! $item->desc !!}
                                                </div>
                                                <div class="price-box">
                                                    <p class="old-price">
                                                        <span class="price-label"></span>
                                                        {{-- <span id="old-price-212" class="price">
                                                            $442.99
                                                        </span> --}}
                                                    </p>
                                                    <p class="special-price">
                                                        <span class="price-label"></span>
                                                        <span id="product-price-212" class="price">
                                                            {{ number_format($item->price, 0, ',', '.') }} Đ
                                                        </span>
                                                    </p>
                                                </div>
                                                <div class="actions">
                                                    <a href="{{ route('route_FE_Client_Products_detail', $item->id) }}"
                                                        class="btn btn-primary" type="button"><span>Xem
                                                            sản phẩm</span></a>

                                                </div>
                                            </div>
                                        </li>
                                    @endforeach


                                </ol>
                            </div>
                            <div class="toolbar bottom">
                                <div class="pager">

                                    <div class="pages">
                                        <label>Page:</label>
                                        <ul class="pagination">
                                            {{ $car->appends('params')->links() }}

                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </article>
                    </div>
                    <!--	///*///======    End article  ========= //*/// -->
                </div>
                <aside class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9 wow bounceInUp animated">
                    <div class="section-filter">
                        <div class="b-filter__inner bg-grey">
                            <h2>Tìm chiếc xe phù hợp của bạn</h2>
                            <form class="b-filter filter_form" action="{{ route('route_FE_Client_Products_filter') }}"
                                method="POST">
                                @csrf
                                <div class="btn-group bootstrap-select" style="width: 100%;">
                                    <select class="selectpicker" name="branch" data-width="100%" tabindex="-98">
                                        <option>Chọn hãng xe</option>
                                        @foreach ($listCarBranch as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="btn-group bootstrap-select" style="width: 100%;">
                                    <select class="selectpicker" name="origin" data-width="100%" tabindex="-98">
                                        <option>Nơi sản xuất</option>
                                        @foreach ($origin as $item)
                                            <option value="{{ $item->origin }}">{{ $item->origin }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="btn-group bootstrap-select" style="width: 100%;">
                                    <select class="selectpicker" name="engine" data-width="100%" tabindex="-98">
                                        <option>Động cơ</option>
                                        @foreach ($engine as $item)
                                            <option value="{{ $item->engine }}">{{ $item->engine }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="btn-group bootstrap-select" style="width: 100%;">
                                    <select class="selectpicker" name="mileage" data-width="100%" tabindex="-98">

                                        <option>Klm</option>
                                        @foreach ($mileage as $item)
                                            <option value="{{ $item->mileage }}">{{ $item->mileage }}</option>
                                        @endforeach


                                    </select>
                                </div>
                                <div class="btn-group bootstrap-select" style="width: 100%;">
                                    <input type="number" class="form-control selectpicker  "name="price"
                                        placeholder="giá xe.." id="">
                                </div>

                                <div>
                                    <div class="b-filter__btns">
                                        <button type="submit"class="btn btn-lg btn-primary btn_filter">tìm kiếm
                                            phương tiện</button>
                                    </div>
                                </div>
                            </form>

                            {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

                            <script>
                                function filter_car() {
                                    event.preventDefault();
                                    let url = $('.filter_form').data('url');

                                    const branch = $('#branch').find(":selected").val();
                                    const origin = $('#origin').find(":selected").val();
                                    const type = $('#type').find(":selected").val();

                                    console.log(branch, origin, type);

                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });

                                    $.ajax({
                                        type: "POST",
                                        url: url,
                                        data: {
                                            _token: '{{ csrf_token() }}',
                                            branch: branch,
                                            origin: origin,
                                            type: type
                                        },

                                        success: function(res) {
                                          console.log(res);
                                        },
                                        error: function() {

                                        }
                                    });
                                }

                                $(function() {
                                    $(document).on('click', '.btn_filter', filter_car);
                                })
                            </script> --}}

                </aside>
                <!--col-right sidebar-->
            </div>
            <!--row-->
        </div>
        <!--container-->
    </section>
    <!--main-container col2-left-layout-->
@endsection
